@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="dashboard-hero">
            <div>
                <p class="eyebrow">Welcome back</p>
                <h2 class="dashboard-title">{{ Auth::user()->name }}</h2>
                <p class="dashboard-subtitle">Your trips and photos, all in one place.</p>
            </div>
            <div class="dashboard-hero-actions">
                <a href="{{ route('trips.create') }}" class="button">New trip</a>
                <a href="{{ route('trips.index') }}" class="button button-secondary">Browse trips</a>
            </div>
        </header>

        @if(session('success'))
            <div class="flash-success">
                {{ session('success') }}
            </div>
        @endif

        <section class="dashboard-stats" aria-label="Overview">
            <article class="stat-card">
                <p class="stat-label">Trips</p>
                <p class="stat-value">{{ $tripCount ?? 0 }}</p>
            </article>
            <article class="stat-card">
                <p class="stat-label">Photos</p>
                <p class="stat-value">{{ $photoCount ?? 0 }}</p>
            </article>
            <article class="stat-card">
                <p class="stat-label">Liked memories</p>
                <p class="stat-value">{{ $likedCount ?? 0 }}</p>
            </article>
        </section>

        <section class="dashboard-section">
            <header class="dashboard-section-header">
                <h3>Recent trips</h3>
                <a href="{{ route('trips.index') }}" class="button button-secondary">View all</a>
            </header>

            @php
                $palette = ['#60a5fa', '#34d399', '#f97316', '#f59e0b', '#a78bfa', '#f472b6', '#22d3ee'];
            @endphp

            @if(!empty($recentTrips) && $recentTrips->count())
                <div class="trip-grid">
                    @foreach($recentTrips as $index => $trip)
                        @php
                            $accent = $palette[$trip->id % count($palette)];
                            $coverUrl = $trip->coverImageUrl;
                        @endphp

                        <article class="trip-card {{ $index === 0 ? 'trip-card--featured' : '' }}">
                            <a href="{{ route('trips.show', $trip) }}"
                               class="trip-card-media"
                               style="--tile-accent: {{ $accent }}; @if($coverUrl) --cover-image: url('{{ $coverUrl }}'); @endif">
                                <div class="trip-card-media-inner">
                                    <div class="trip-card-chips">
                                        <span class="card-chip">Trip</span>
                                        <span class="trip-metric">{{ $trip->images_count }} photos</span>
                                        <span class="trip-metric">{{ $trip->memories_count }} memories</span>
                                    </div>
                                    <h3>{{ $trip->title }}</h3>
                                    <p class="card-subtitle">{{ $trip->location }}</p>
                                    <p class="trip-card-dates">
                                        {{ $trip->start_date }}
                                        <span class="meta-divider">to</span>
                                        {{ $trip->end_date ?? 'Ongoing' }}
                                    </p>
                                </div>
                            </a>
                            <div class="trip-card-actions">
                                <a href="{{ route('trips.show', $trip) }}" class="button">Open</a>
                                <a href="{{ route('trips.edit', $trip) }}" class="button button-secondary">Edit</a>
                            </div>

                            @if($trip->images->count())
                                <div class="trip-thumb-row" aria-label="Trip photo previews">
                                    @foreach($trip->images->take(5) as $image)
                                        @php
                                            $imageUrl = asset('storage/' . $image->path);
                                        @endphp
                                        <a class="trip-thumb-link" href="{{ route('trips.show', $trip) }}" aria-label="Open trip">
                                            <img
                                                class="trip-thumb"
                                                src="{{ $imageUrl }}"
                                                alt="Trip photo preview"
                                                loading="lazy"
                                            >
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </article>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <h3>No trips yet</h3>
                    <p>Create your first trip and start uploading photos.</p>
                    <a href="{{ route('trips.create') }}" class="button">Create your first trip</a>
                </div>
            @endif
        </section>
    </section>
@endsection
