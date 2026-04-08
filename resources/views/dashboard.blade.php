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
                <div class="trip-carousel" data-carousel>
                    <div class="trip-carousel-nav" aria-label="Trip navigation">
                        <button type="button" class="carousel-nav" data-carousel-prev aria-label="Previous trip">‹</button>
                        <button type="button" class="carousel-nav" data-carousel-next aria-label="Next trip">›</button>
                    </div>

                    <div class="trip-carousel-track" data-carousel-track tabindex="0" aria-label="Recent trips carousel">
                    @foreach($recentTrips as $trip)
                        @php
                            $accent = $palette[$trip->id % count($palette)];
                            $coverUrl = $trip->coverImageUrl;
                            $slideshowImages = collect($trip->images)
                                ->map(fn ($image) => asset('storage/' . $image->path))
                                ->prepend($coverUrl)
                                ->filter()
                                ->unique()
                                ->values();
                        @endphp

                        <article class="trip-card trip-card--hero">
                            <a href="{{ route('trips.show', $trip) }}"
                               class="trip-card-media trip-card-media--slideshow"
                               @if($slideshowImages->count() > 1) data-dashboard-slideshow='@json($slideshowImages)' @endif
                               style="--tile-accent: {{ $accent }}; @if($coverUrl) --cover-image: url('{{ $coverUrl }}'); @endif">
                                @if($slideshowImages->count())
                                    <img class="trip-card-media-photo" src="{{ $slideshowImages->first() }}" alt="" loading="lazy">
                                @endif
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
                        </article>
                    @endforeach
                    </div>
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

@push('scripts')
    <script src="{{ asset('js/dashboard-slideshow.js') }}" defer></script>
    <script src="{{ asset('js/dashboard-carousel.js') }}" defer></script>
@endpush
