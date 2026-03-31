@extends('layouts.app')

@section('content')
    <section>
        <header>
            <h2>Your Trips</h2>
            <a href="/trips/create">Create New Trip</a>
        </header>

        @if($trips->isEmpty())
            <p>No trips created yet.</p>
        @else
            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Dates</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($trips as $trip)
                    <tr>
                        <td>{{ $trip->title }}</td>
                        <td>{{ $trip->location }}</td>
                        <td>
                            {{ $trip->start_date }}
                            -
                            {{ $trip->end_date ?? 'Ongoing' }}
                        </td>
                        <td>
                            <a href="/trips/{{ $trip->id }}">View</a>
                            <a href="/trips/{{ $trip->id }}/edit">Edit</a>

                            <form method="POST" action="/trips/{{ $trip->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </section>
@endsection