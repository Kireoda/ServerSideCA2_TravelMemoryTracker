@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <div>
                <p class="eyebrow">Trip memories</p>
                <h2>{{ $trip->title }}</h2>
            </div>
            <div class="header-actions">
                <a href="{{ route('trips.show', $trip) }}" class="button button-secondary">Back to Trip</a>
            </div>
        </header>

        @if(session('success'))
            <div class="flash-success">
                {{ session('success') }}
            </div>
        @endif

        @if($trip->images->count())
            <section class="detail-panel">
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
            </section>
        @endif

        @php
            $palette = ['#38bdf8', '#facc15', '#f472b6', '#4ade80', '#fb7185', '#a78bfa', '#f97316'];
        @endphp

        @if($memories->count())
            <div class="gallery-grid">
                @foreach($memories as $memory)
                    @php
                        $accent = $palette[$memory->id % count($palette)];
                    @endphp
                    <article class="gallery-card">
                        <a href="{{ route('trips.memories.show', [$trip, $memory]) }}" class="card-media" style="--tile-accent: {{ $accent }};">
                            <div class="card-media-inner">
                                <span class="card-chip">Memory</span>
                                <h3>{{ $memory->title }}</h3>
                                <p class="card-subtitle">{{ $memory->location ?: 'No location set' }}</p>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="meta-line">
                                {{ $memory->date ?: 'No date yet' }}
                            </p>
                            <p class="card-description">{{ $memory->description ?: 'No description yet.' }}</p>
                            <div class="card-actions">
                                <a href="{{ route('trips.memories.show', [$trip, $memory]) }}" class="button">View</a>
                                <x-like-button :trip="$trip" :memory="$memory" size="sm" />
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h3>No memories generated yet</h3>
                <p>Memories appear automatically based on your trip details.</p>
            </div>
        @endif
    </section>
@endsection
