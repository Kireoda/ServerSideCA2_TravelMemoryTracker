@extends('layouts.app')

@section('content')
    <h1>{{ $memory->title }}</h1>

    <p><strong>Location:</strong> {{ $memory->location }}</p>
    <p><strong>Date:</strong> {{ $memory->date }}</p>
    <p><strong>Description:</strong> {{ $memory->description }}</p>

    <a href="{{ route('trips.memories.edit', [$trip, $memory]) }}">Edit</a>
    <a href="{{ route('trips.memories.index', $trip) }}">Back</a>
@endsection