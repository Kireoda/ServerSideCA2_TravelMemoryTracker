@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <div>
                <p class="eyebrow">Your library</p>
                <h2>Your Trips</h2>
            </div>
            <a href="{{ route('trips.create') }}" class="button">Create New Trip</a>
        </header>

        @if(session('success'))
            <div class="flash-success">
                {{ session('success') }}
            </div>
        @endif

        @php
            $palette = ['#60a5fa', '#34d399', '#f97316', '#f59e0b', '#a78bfa', '#f472b6', '#22d3ee'];
        @endphp

        @if($trips->count())
            <div class="trip-grid">
                @foreach($trips as $index => $trip)
                    @php
                        $accent = $palette[$trip->id % count($palette)];
                        $coverUrl = $trip->coverImageUrl;
                        $isFeatured = $index === 0;
                    @endphp

                    <article class="trip-card {{ $isFeatured ? 'trip-card--featured' : '' }}">
                        <a href="{{ route('trips.show', $trip) }}"
                           class="trip-card-media"
                           style="--tile-accent: {{ $accent }}; @if($coverUrl) --cover-image: url('{{ $coverUrl }}'); @endif">
                            <div class="trip-card-media-inner">
                                <div class="trip-card-chips">
                                    <span class="card-chip">Trip</span>
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
                        <div class="trip-card-footer">
                            <div class="trip-card-actions">
                                <a href="{{ route('trips.edit', $trip) }}" class="button button-secondary button-sm">Edit</a>
                                <form method="POST" action="{{ route('trips.destroy', $trip) }}" onsubmit="return confirm('Delete this trip?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button button-danger button-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h3>No trips yet</h3>
                <p>Create your first trip to start your memory gallery.</p>
            </div>
        @endif
    </section>
@endsection
