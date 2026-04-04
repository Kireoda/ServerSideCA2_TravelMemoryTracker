@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="dashboard">

        <div class="page-header">
            <div>
                <h2>Dashboard</h2>
                <p>Your travel memories at a glance</p>
            </div>

            <a href="/trips/create" class="button">+ New Trip</a>
        </div>

        @if($trips->isEmpty())
            <div class="empty-state">
                <h3>No trips yet</h3>
                <p>Start by creating your first trip.</p>
                <a href="/trips/create" class="button">Create Trip</a>
            </div>
        @else

            <div class="trip-grid">
                @foreach ($trips as $trip)
                    <div class="trip-card">

                        <div class="trip-card-header">
                            <h3>{{ $trip->title }}</h3>
                            <span class="trip-location">
                            {{ $trip->location }}
                        </span>
                        </div>

                        <div class="trip-dates">
                            {{ $trip->start_date }}
                            —
                            {{ $trip->end_date ?? 'Ongoing' }}
                        </div>

                        <p class="trip-description">
                            {{ Str::limit($trip->description, 100) }}
                        </p>

                        <div class="trip-actions">
                            <a href="/trips/{{ $trip->id }}">View</a>
                            <a href="/trips/{{ $trip->id }}/edit">Edit</a>
                        </div>

                    </div>
                @endforeach
            </div>

        @endif

    </section>
@endsection