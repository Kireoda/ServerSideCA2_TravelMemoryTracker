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
                <a href="{{ route('trips.memories.create', $trip) }}" class="button">Add Memory</a>
            </div>
        </header>

        @if(session('success'))
            <div class="flash-success">
                {{ session('success') }}
            </div>
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
                                <a href="{{ route('trips.memories.edit', [$trip, $memory]) }}" class="button button-secondary">Edit</a>
                                <form action="{{ route('trips.memories.destroy', [$trip, $memory]) }}" method="POST">
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
                <h3>No memories yet</h3>
                <p>Add your first memory to start filling this trip.</p>
            </div>
        @endif
    </section>
@endsection
