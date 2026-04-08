@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>Create New Trip</h2>
            <a href="{{ route('trips.index') }}" class="button button-secondary">Back</a>
        </header>

        <div class="form-card">
            <form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
                @include('trips._form')
            </form>
        </div>
    </section>
@endsection
