@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>Your Trips</h2>
            <a href="{{ route('trips.create') }}" class="button">Create New Trip</a>
        </header>

        @if(session('success'))
            <div class="flash-success">
                {{ session('success') }}
            </div>
        @endif

        @if($trips->count())
            <table class="trip-table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Dates</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trips as $trip)
                    <tr>
                        <td>{{ $trip->title }}</td>
                        <td>{{ $trip->location }}</td>
                        <td>
                            {{ $trip->start_date }}<br>
                            <span style="color:#6b7280;">to {{ $trip->end_date ?? 'Ongoing' }}</span>
                        </td>
                        <td>
                            <div class="trip-actions-inline">
                                <a href="{{ route('trips.show', $trip) }}" class="button">View</a>
                                <a href="{{ route('trips.edit', $trip) }}" class="button button-secondary">Edit</a>

                                <form method="POST" action="{{ route('trips.destroy', $trip) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button button-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No trips created yet.</p>
        @endif
    </section>
@endsection