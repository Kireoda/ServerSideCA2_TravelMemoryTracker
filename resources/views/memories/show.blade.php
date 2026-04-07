@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="detail-hero">
            <div class="detail-hero-media">
                <span class="card-chip">Memory</span>
            </div>
            <div class="detail-hero-body">
                <p class="eyebrow">{{ $trip->title }}</p>
                <h2>{{ $memory->title }}</h2>
                <p class="detail-location">{{ $memory->location ?: 'No location set' }}</p>
                <p class="detail-dates">{{ $memory->date ?: 'No date yet' }}</p>
                <div class="detail-actions">
                    <a href="{{ route('trips.memories.index', $trip) }}" class="button button-secondary">Back to Memories</a>
                    <a href="{{ route('trips.memories.edit', [$trip, $memory]) }}" class="button">Edit Memory</a>
                </div>
            </div>
        </header>

        <article class="detail-panel">
            <h3>Description</h3>
            <p>{{ $memory->description ?: 'No description provided yet.' }}</p>
        </article>
    </section>
@endsection
