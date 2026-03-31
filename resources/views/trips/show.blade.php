@extends('layouts.app')

@section('content')
    <section>
        <header>
            <h2>{{ $trip->title }}</h2>
        </header>

        <article>
            <p><strong>Location:</strong> {{ $trip->location }}</p>
            <p><strong>Start Date:</strong> {{ $trip->start_date }}</p>
            <p><strong>End Date:</strong> {{ $trip->end_date ?? 'Ongoing' }}</p>
            <p><strong>Description:</strong></p>
            <p>{{ $trip->description }}</p>
        </article>

        <section>
            <a href="/trips/{{ $trip->id }}/edit">Edit Trip</a>

            <form method="POST" action="/trips/{{ $trip->id }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Trip</button>
            </form>
        </section>
    </section>
@endsection