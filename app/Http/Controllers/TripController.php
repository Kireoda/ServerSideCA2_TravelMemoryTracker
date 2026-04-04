<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::latest()->get();
        return view('dashboard', compact('trips'));
    }

    public function create()
    {
        return view('trips.create');
    }

    public function store(Request $request)
    {
        Trip::create([
            'title' => $request->title,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);

        return redirect('/trips');
    }

    public function show($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trips.show', compact('trip'));
    }

    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trips.edit', compact('trip'));
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $trip->update($request->all());
        return redirect('/trips');
    }

    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();
        return redirect('/trips');
    }
}