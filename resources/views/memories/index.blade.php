@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>Memories for "{{ $trip->title }}"</h2>
            <div>
                <a href="{{ route('trips.show', $trip) }}" class="button button-secondary">Back to Trip</a>
                <a href="{{ route('trips.memories.create', $trip) }}" class="button">Add Memory</a>
            </div>
        </header>

        @if(session('success'))
            <div class="flash-success">
                {{ session('success') }}
            </div>
        @endif

        @forelse($memories as $memory)
            <div class="memory-card">
                <h3>{{ $memory->title }}</h3>
                <p><strong>Location:</strong> {{ $memory->location ?: 'N/A' }}</p>
                <p><strong>Date:</strong> {{ $memory->date ?: 'N/A' }}</p>
                <p><strong>Description:</strong> {{ $memory->description ?: 'No description.' }}</p>

                <a href="{{ route('trips.memories.show', [$trip, $memory]) }}" class="button">View</a>
                <a href="{{ route('trips.memories.edit', [$trip, $memory]) }}" class="button button-secondary">Edit</a>

                <form action="{{ route('trips.memories.destroy', [$trip, $memory]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button button-danger">Delete</button>
                </form>
            </div>
        @empty
            <p>No memories yet.</p>
        @endforelse
    </section>
@endsection