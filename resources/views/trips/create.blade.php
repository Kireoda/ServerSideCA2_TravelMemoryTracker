@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>Create New Trip</h2>
            <a href="{{ route('trips.index') }}" class="button">Back to Trips</a>
        </header>

        <form method="POST" action="{{ route('trips.store') }}" class="form">
            @csrf

            <div class="form-group">
                <label for="title">Trip Title</label>
                <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="e.g. Summer in Spain"
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
                        value="{{ old('location') }}"
                        placeholder="e.g. Barcelona"
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
                            value="{{ old('start_date') }}"
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
                            value="{{ old('end_date') }}"
                    >
                    @error('end_date')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                        id="description"
                        name="description"
                        placeholder="Write about your trip..."
                >{{ old('description') }}</textarea>
                @error('description')
                <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Create Trip</button>
                <a href="{{ route('trips.index') }}" class="button">Cancel</a>
            </div>
        </form>
    </section>
@endsection