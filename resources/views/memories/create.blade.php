@extends('layouts.app')

@section('content')
    <h1>Add Memory for "{{ $trip->title }}"</h1>

    <form action="{{ route('trips.memories.store', $trip) }}" method="POST">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="location">Location</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}">
            @error('location')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{ old('date') }}">
            @error('date')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
            <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Save Memory</button>
    </form>
@endsection