@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>{{ $trip->title }}</h2>
            <a href="{{ route('trips.index') }}" class="button button-secondary">Back to Trips</a>
        </header>

        <article class="trip-details">
            <p><strong>Location:</strong> {{ $trip->location }}</p>
            <p><strong>Start Date:</strong> {{ $trip->start_date }}</p>
            <p><strong>End Date:</strong> {{ $trip->end_date ?? 'Ongoing' }}</p>
            <p><strong>Description:</strong></p>
            <p>{{ $trip->description ?: 'No description added.' }}</p>
        </article>

        <section class="trip-memories">
            <h3>Memories</h3>
            <a href="{{ route('trips.memories.index', $trip) }}" class="button">View Memories</a>
            <a href="{{ route('trips.memories.create', $trip) }}" class="button">Add Memory</a>
        </section>

        <section class="trip-actions">
            <a href="{{ route('trips.edit', $trip) }}" class="button button-secondary">Edit Trip</a>

            <form method="POST" action="{{ route('trips.destroy', $trip) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="button button-danger">Delete Trip</button>
            </form>
        </section>
    </section>
@endsection