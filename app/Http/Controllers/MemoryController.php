<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Memory;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    private function authorizeTrip(Trip $trip)
    {
        abort_if($trip->user_id !== auth()->id(), 403);
    }

    public function index(Trip $trip)
    {
        $this->authorizeTrip($trip);

        $memories = $trip->memories()->latest()->get();

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
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $trip->memories()->create($validated);

        return redirect()->route('trips.memories.index', $trip)
            ->with('success', 'Memory created successfully.');
    }

    public function show(Trip $trip, Memory $memory)
    {
        $this->authorizeTrip($trip);
        abort_if($memory->trip_id !== $trip->id, 404);

        return view('memories.show', compact('trip', 'memory'));
    }

    public function edit(Trip $trip, Memory $memory)
    {
        $this->authorizeTrip($trip);
        abort_if($memory->trip_id !== $trip->id, 404);

        return view('memories.edit', compact('trip', 'memory'));
    }

    public function update(Request $request, Trip $trip, Memory $memory)
    {
        $this->authorizeTrip($trip);
        abort_if($memory->trip_id !== $trip->id, 404);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $memory->update($validated);

        return redirect()->route('trips.memories.index', $trip)
            ->with('success', 'Memory updated successfully.');
    }

    public function destroy(Trip $trip, Memory $memory)
    {
        $this->authorizeTrip($trip);
        abort_if($memory->trip_id !== $trip->id, 404);

        $memory->delete();

        return redirect()->route('trips.memories.index', $trip)
            ->with('success', 'Memory deleted successfully.');
    }
}