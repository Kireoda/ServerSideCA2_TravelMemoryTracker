@extends('layouts.app')

@section('content')
    <section>
        <header>
            <h2>Edit Trip</h2>
        </header>

        <form method="POST" action="/trips/{{ $trip->id }}">
            @csrf
            @method('PUT')

            <div>
                <label>Trip Title</label>
                <input type="text" name="title" value="{{ $trip->title }}" required>
            </div>

            <div>
                <label>Location</label>
                <input type="text" name="location" value="{{ $trip->location }}" required>
            </div>

            <div>
                <label>Start Date</label>
                <input type="date" name="start_date" value="{{ $trip->start_date }}" required>
            </div>

            <div>
                <label>End Date</label>
                <input type="date" name="end_date" value="{{ $trip->end_date }}">
            </div>

            <div>
                <label>Description</label>
                <textarea name="description">{{ $trip->description }}</textarea>
            </div>

            <button type="submit">Update Trip</button>
        </form>
    </section>
@endsection