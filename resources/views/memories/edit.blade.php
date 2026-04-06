@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>Edit Memory</h2>
            <a href="{{ route('trips.memories.index', $trip) }}" class="button button-secondary">Back</a>
        </header>

        <div class="form-card">
            <form action="{{ route('trips.memories.update', [$trip, $memory]) }}" method="POST">
                @include('memories._form', ['memory' => $memory])
            </form>
        </div>
    </section>
@endsection