<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use App\Models\Trip;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    public function index(Trip $trip)
    {
        $this->authorizeTrip($trip);

        $this->generateMemoriesIfMissing($trip);

        $memories = $trip->memories()
            ->latest()
            ->get();

        return view('memories.index', compact('trip', 'memories'));
    }

    public function create(Trip $trip)
    {
        $this->authorizeTrip($trip);

        return view('memories.create', compact('trip'));
    }

    public function store(Request $request, Trip $trip)
    {
        $this->authorizeTrip($trip);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
        ]);

        $trip->memories()->create($validated);

        return redirect()
            ->route('trips.memories.index', $trip)
            ->with('success', 'Memory created successfully.');
    }

    public function show(Trip $trip, Memory $memory)
    {
        $this->authorizeTrip($trip);
        $this->authorizeMemory($trip, $memory);

        $trip->load('images');

        return view('memories.show', compact('trip', 'memory'));
    }

    public function edit(Trip $trip, Memory $memory)
    {
        $this->authorizeTrip($trip);
        $this->authorizeMemory($trip, $memory);

        return view('memories.edit', compact('trip', 'memory'));
    }

    public function update(Request $request, Trip $trip, Memory $memory)
    {
        $this->authorizeTrip($trip);
        $this->authorizeMemory($trip, $memory);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
        ]);

        $memory->update($validated);

        return redirect()
            ->route('trips.memories.index', $trip)
            ->with('success', 'Memory updated successfully.');
    }

    public function destroy(Trip $trip, Memory $memory)
    {
        $this->authorizeTrip($trip);
        $this->authorizeMemory($trip, $memory);

        $memory->delete();

        return redirect()
            ->route('trips.memories.index', $trip)
            ->with('success', 'Memory deleted successfully.');
    }

    public function toggleLike(Trip $trip, Memory $memory)
    {
        $this->authorizeTrip($trip);
        $this->authorizeMemory($trip, $memory);

        $memory->liked = ! $memory->liked;
        $memory->save();

        return back()->with('success', $memory->liked ? 'Memory liked.' : 'Memory unliked.');
    }

    private function authorizeTrip(Trip $trip): void
    {
        abort_if($trip->user_id !== auth()->id(), 403);
    }

    private function authorizeMemory(Trip $trip, Memory $memory): void
    {
        abort_if($memory->trip_id !== $trip->id, 404);
    }

    private function generateMemoriesIfMissing(Trip $trip): void
    {
        if ($trip->memories()->exists()) {
            return;
        }

        $trip->memories()->create([
            'title' => 'Trip overview',
            'location' => $trip->location,
            'date' => $trip->start_date,
            'description' => $trip->description
                ?: sprintf('A memory generated from the trip "%s".', $trip->title),
        ]);
    }
}
