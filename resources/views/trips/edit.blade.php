@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>Edit Trip</h2>
            <a href="{{ route('trips.show', $trip) }}" class="button button-secondary">Back</a>
        </header>

        <div class="form-card">
            <form action="{{ route('trips.update', $trip) }}" method="POST" enctype="multipart/form-data">
                @include('trips._form', ['trip' => $trip])
            </form>
        </div>
    </section>
@endsection
