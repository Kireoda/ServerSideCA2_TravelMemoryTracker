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
                    <x-like-button :trip="$trip" :memory="$memory" />
                </div>
            </div>
        </header>

        <article class="detail-panel">
            <h3>Description</h3>
            <p>{{ $memory->description ?: 'No description provided yet.' }}</p>
        </article>

        @if($trip->images->count())
            <article class="detail-panel">
                <div class="panel-header">
                    <h3>Trip Gallery</h3>
                    <span class="memory-count">{{ $trip->images->count() }} photos</span>
                </div>
                <div class="image-grid">
                    @foreach($trip->images as $image)
                        <div class="image-tile">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="Trip photo">
                        </div>
                    @endforeach
                </div>
            </article>
        @endif
    </section>
@endsection
