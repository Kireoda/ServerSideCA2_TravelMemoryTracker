@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="detail-hero">
            <div class="detail-hero-media">
                <span class="card-chip">Trip</span>
            </div>
            <div class="detail-hero-body">
                <p class="eyebrow">Trip overview</p>
                <h2>{{ $trip->title }}</h2>
                <p class="detail-location">{{ $trip->location }}</p>
                <p class="detail-dates">
                    {{ $trip->start_date }}
                    <span class="meta-divider">to</span>
                    {{ $trip->end_date ?? 'Ongoing' }}
                </p>
                <div class="detail-actions">
                    <a href="{{ route('trips.index') }}" class="button button-secondary">Back to Trips</a>
                    <a href="{{ route('trips.edit', $trip) }}" class="button">Edit Trip</a>
                    <form method="POST" action="{{ route('trips.destroy', $trip) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button button-danger">Delete Trip</button>
                    </form>
                </div>
            </div>
        </header>

        <article class="detail-panel">
            <h3>Description</h3>
            <p>{{ $trip->description ?: 'No description added yet.' }}</p>
        </article>

        <section class="detail-panel">
            <div class="panel-header">
                <h3>Memories</h3>
                <span class="memory-count">{{ $trip->memories()->count() }} total</span>
            </div>
            <div class="panel-actions">
                <a href="{{ route('trips.memories.index', $trip) }}" class="button">View Memories</a>
                <a href="{{ route('trips.memories.create', $trip) }}" class="button button-secondary">Add Memory</a>
            </div>
        </section>
    </section>
@endsection
