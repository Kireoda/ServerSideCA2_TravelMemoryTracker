<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use App\Models\Trip;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    public function create($tripId)
    {
        $trip = Trip::findOrFail($tripId);
        return view('memories.create', compact('trip'));
    }

    public function store(Request $request, $tripId)
    {
        Memory::create([
            'trip_id' => $tripId,
            'title' => $request->title,
            'location' => $request->location,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        return redirect('/trips/' . $tripId);
    }

    public function edit($id)
    {
        $memory = Memory::findOrFail($id);
        return view('memories.edit', compact('memory'));
    }

    public function update(Request $request, $id)
    {
        $memory = Memory::findOrFail($id);

        $memory->update($request->all());

        return redirect('/trips/' . $memory->trip_id);
    }

    public function destroy($id)
    {
        $memory = Memory::findOrFail($id);
        $tripId = $memory->trip_id;

        $memory->delete();

        return redirect('/trips/' . $tripId);
    }
}