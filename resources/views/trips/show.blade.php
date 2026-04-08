@extends('layouts.app')

@section('content')
    <section class="page page--flush">
        @php
            $coverUrl = $trip->coverImageUrl;
        @endphp
        <header class="trip-hero" style="@if($coverUrl) --cover-image: url('{{ $coverUrl }}'); @endif">
            <div class="trip-hero-overlay">
                <div class="trip-hero-top">
                    <a href="{{ route('trips.index') }}" class="button button-secondary">Back</a>
                    <div class="trip-hero-actions">
                        <a href="{{ route('trips.edit', $trip) }}" class="button">Edit Trip</a>
                        <form method="POST" action="{{ route('trips.destroy', $trip) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button button-danger">Delete</button>
                        </form>
                    </div>
                </div>

                <div class="trip-hero-body">
                    <div class="trip-hero-chips">
                        <span class="card-chip">Trip</span>
                        <span class="trip-metric">{{ $trip->images->count() }} photos</span>
                        <span class="trip-metric">{{ $trip->memories->count() }} memories</span>
                    </div>
                    <h1 class="trip-hero-title">{{ $trip->title }}</h1>
                    <p class="trip-hero-subtitle">{{ $trip->location }}</p>
                    <p class="trip-hero-dates">
                        {{ $trip->start_date }}
                        <span class="meta-divider">to</span>
                        {{ $trip->end_date ?? 'Ongoing' }}
                    </p>
                </div>
            </div>
        </header>

        <div class="trip-body">
        <section class="trip-content-grid">
            <article class="detail-panel">
                <h3>Description</h3>
                <p>{{ $trip->description ?: 'No description added yet.' }}</p>
            </article>

            <section class="detail-panel">
                <div class="panel-header">
                    <h3>Memories</h3>
                    <span class="memory-count">{{ $trip->memories->count() }} total</span>
                </div>
                <div class="panel-actions">
                    <a href="{{ route('trips.memories.index', $trip) }}" class="button">View Memories</a>
                </div>

                @if($trip->memories->count())
                    <div class="memory-slider" data-memory-slider>
                        <div class="memory-slider-controls">
                            <button type="button" class="button button-secondary" data-memory-prev>Prev</button>
                            <button type="button" class="button button-secondary" data-memory-next>Next</button>
                        </div>

                        <div class="memory-slides" aria-live="polite">
                            @foreach($trip->memories as $memory)
                                <article class="memory-slide" data-memory-slide hidden>
                                    <p class="eyebrow">Generated memory</p>
                                    <h4>{{ $memory->title }}</h4>
                                    <p class="meta-line">
                                        {{ $memory->date ?: 'No date yet' }}
                                        <span class="meta-divider">•</span>
                                        {{ $memory->location ?: 'No location set' }}
                                    </p>
                                    <p class="card-description">{{ $memory->description ?: 'No description yet.' }}</p>
                                    <div class="card-actions">
                                        <a class="button" href="{{ route('trips.memories.show', [$trip, $memory]) }}">Open</a>
                                        <x-like-button :trip="$trip" :memory="$memory" size="sm" />
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="memory-slider-dots" aria-label="Memory slides">
                            @foreach($trip->memories as $memoryIndex => $memory)
                                <button type="button" class="memory-dot" data-memory-dot aria-current="false">
                                    <span class="sr-only">Go to memory {{ $memoryIndex + 1 }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="empty-state">
                        <h3>No memories yet</h3>
                        <p>Memories appear automatically based on your trip details.</p>
                    </div>
                @endif
            </section>
        </section>

        @if($trip->images->count())
            <section class="detail-panel">
                <div class="panel-header">
                    <h3>Trip Gallery</h3>
                    <span class="memory-count">{{ $trip->images->count() }} photos</span>
                </div>
                <div class="photo-masonry">
                    @foreach($trip->images as $imageIndex => $image)
                        @php
                            $imageUrl = asset('storage/' . $image->path);
                        @endphp
                        <button
                            type="button"
                            class="photo-tile"
                            data-lightbox-item
                            data-full="{{ $imageUrl }}"
                            data-alt="Trip photo {{ $imageIndex + 1 }}"
                        >
                            <img src="{{ $imageUrl }}" alt="Trip photo {{ $imageIndex + 1 }}">
                        </button>
                    @endforeach
                </div>
            </section>
        @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/trip-show.js') }}" defer></script>
@endpush
