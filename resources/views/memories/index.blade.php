@extends('layouts.app')

@section('content')
    <h1>Memories for "{{ $trip->title }}"</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('trips.memories.create', $trip) }}">Add Memory</a>

    @forelse($memories as $memory)
        <div>
            <h3>{{ $memory->title }}</h3>
            <p>{{ $memory->location }}</p>
            <p>{{ $memory->date }}</p>

            <a href="{{ route('trips.memories.show', [$trip, $memory]) }}">View</a>
            <a href="{{ route('trips.memories.edit', [$trip, $memory]) }}">Edit</a>

            <form action="{{ route('trips.memories.destroy', [$trip, $memory]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @empty
        <p>No memories yet.</p>
    @endforelse

    <a href="{{ route('trips.show', $trip) }}">Back to Trip</a>
@endsection