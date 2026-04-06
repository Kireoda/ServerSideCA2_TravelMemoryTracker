@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>Add Memory for "{{ $trip->title }}"</h2>
            <a href="{{ route('trips.memories.index', $trip) }}" class="button button-secondary">Back</a>
        </header>

        <div class="form-card">
            <form action="{{ route('trips.memories.store', $trip) }}" method="POST">
                @include('memories._form')
            </form>
        </div>
    </section>
@endsection