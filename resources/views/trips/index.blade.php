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
            <div class="gallery-grid">
                @foreach($trips as $trip)
                    @php
                        $accent = $palette[$trip->id % count($palette)];
                    @endphp
                    <article class="gallery-card">
                        <a href="{{ route('trips.show', $trip) }}" class="card-media" style="--tile-accent: {{ $accent }};">
                            <div class="card-media-inner">
                                <span class="card-chip">Trip</span>
                                <h3>{{ $trip->title }}</h3>
                                <p class="card-subtitle">{{ $trip->location }}</p>
                            </div>
                        </a>
                        <div class="card-body">
                            <p class="meta-line">
                                {{ $trip->start_date }}
                                <span class="meta-divider">to</span>
                                {{ $trip->end_date ?? 'Ongoing' }}
                            </p>
                            <div class="card-actions">
                                <a href="{{ route('trips.show', $trip) }}" class="button">View</a>
                                <a href="{{ route('trips.edit', $trip) }}" class="button button-secondary">Edit</a>
                                <form method="POST" action="{{ route('trips.destroy', $trip) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button button-danger">Delete</button>
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
