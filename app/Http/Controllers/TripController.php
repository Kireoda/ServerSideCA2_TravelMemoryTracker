<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\TripImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::where('user_id', auth()->id())
            ->with('images')
            ->withCount(['images', 'memories'])
            ->latest()
            ->get();

        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        return view('trips.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'description' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'image', 'max:10240'],
            'gallery_images' => ['nullable', 'array'],
            'gallery_images.*' => ['image', 'max:10240'],
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')
                ->store('trip-covers', 'public');
        }

        $trip = Trip::create($validated);

        $galleryPaths = $this->storeGalleryImages($request, $trip);

        if (! $trip->cover_image && $galleryPaths) {
            $trip->update(['cover_image' => $galleryPaths[0]]);
        }

        return redirect()
            ->route('trips.index')
            ->with('success', 'Trip created successfully.');
    }

    public function show(Trip $trip)
    {
        $this->authorizeTrip($trip);

        $trip->load('memories', 'images');

        return view('trips.show', compact('trip'));
    }

    public function edit(Trip $trip)
    {
        $this->authorizeTrip($trip);

        $trip->load('images');

        return view('trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        $this->authorizeTrip($trip);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'description' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'image', 'max:10240'],
            'cover_choice' => ['nullable', 'string'],
            'gallery_images' => ['nullable', 'array'],
            'gallery_images.*' => ['image', 'max:10240'],
        ]);

        if ($request->hasFile('cover_image')) {
            if ($trip->cover_image) {
                Storage::disk('public')->delete($trip->cover_image);
            }

            $validated['cover_image'] = $request->file('cover_image')
                ->store('trip-covers', 'public');
        } elseif (! empty($validated['cover_choice'])) {
            $validated['cover_image'] = $validated['cover_choice'];
        }

        unset($validated['cover_choice'], $validated['gallery_images']);

        $trip->update($validated);

        $galleryPaths = $this->storeGalleryImages($request, $trip);

        if (! $trip->cover_image && $galleryPaths) {
            $trip->update(['cover_image' => $galleryPaths[0]]);
        }

        return redirect()
            ->route('trips.index')
            ->with('success', 'Trip updated successfully.');
    }

    public function destroy(Trip $trip)
    {
        $this->authorizeTrip($trip);

        $trip->delete();

        return redirect()
            ->route('trips.index')
            ->with('success', 'Trip deleted successfully.');
    }

    private function authorizeTrip(Trip $trip): void
    {
        abort_if($trip->user_id !== auth()->id(), 403);
    }

    /**
     * @return array<int, string>
     */
    private function storeGalleryImages(Request $request, Trip $trip): array
    {
        if (! $request->hasFile('gallery_images')) {
            return [];
        }

        $paths = [];
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('trip-images', 'public');
            TripImage::create([
                'trip_id' => $trip->id,
                'path' => $path,
            ]);
            $paths[] = $path;
        }

        return $paths;
    }
}
