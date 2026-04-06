@extends('layouts.app')

@section('content')
    <h1>Edit Memory</h1>

    <form action="{{ route('trips.memories.update', [$trip, $memory]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $memory->title) }}">
        </div>

        <div>
            <label for="location">Location</label>
            <input type="text" name="location" id="location" value="{{ old('location', $memory->location) }}">
        </div>

        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{ old('date', $memory->date) }}">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description', $memory->description) }}</textarea>
        </div>

        <button type="submit">Update Memory</button>
    </form>
@endsection