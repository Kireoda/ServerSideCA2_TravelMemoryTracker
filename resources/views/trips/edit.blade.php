@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>Edit Trip</h2>
            <a href="{{ route('trips.index') }}" class="button">Back to Trips</a>
        </header>

        <form method="POST" action="{{ route('trips.update', $trip->id) }}" class="form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Trip Title</label>
                <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $trip->title) }}"
                        required
                >
                @error('title')
                <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input
                        type="text"
                        id="location"
                        name="location"
                        value="{{ old('location', $trip->location) }}"
                        required
                >
                @error('location')
                <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            value="{{ old('start_date', $trip->start_date) }}"
                            required
                    >
                    @error('start_date')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input
                            type="date"
                            id="end_date"
                            name="end_date"
                            value="{{ old('end_date', $trip->end_date) }}"
                    >
                    @error('end_date')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description', $trip->description) }}</textarea>
                @error('description')
                <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Update Trip</button>
                <a href="{{ route('trips.index') }}" class="button">Cancel</a>
            </div>
        </form>
    </section>
@endsection