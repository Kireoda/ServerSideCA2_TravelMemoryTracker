@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <div>
                <p class="eyebrow">Trip Images</p>
                <h2>{{ $trip->title }}</h2>
            </div>
            <div class="header-actions">
                <a href="{{ route('trips.memories.create', $trip) }}" class="button">Add Journal Entry</a>
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
                                @if($trip->images->count())
                                    <img src="{{ asset('storage/' . $trip->images->first()->path) }}"
                                         alt="{{ $memory->title }}"
                                         style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;">
                                @endif
                                <span class="card-chip">Top Journal Entry</span>
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
                    <h3>No Journal Entries yet</h3>
                    <p>Create your first journal entry for this trip.</p>
                    <a href="{{ route('trips.memories.create', $trip) }}" class="button">Add Journal Entry</a>
                </div>
            @endif
    </section>
@endsection
