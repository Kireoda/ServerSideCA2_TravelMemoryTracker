@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <div>
                <p class="eyebrow">Welcome back</p>
                <h2>{{ __('Dashboard') }}</h2>
            </div>
            <a href="{{ route('trips.index') }}" class="button">View Trips</a>
        </header>

        <div class="dashboard-grid">
            <article class="dashboard-card">
                <h3>Your gallery</h3>
                <p>{{ __("You're logged in!") }} Start curating your trips and memories.</p>
                <a href="{{ route('trips.create') }}" class="button">Create New Trip</a>
            </article>
            <article class="dashboard-card">
                <h3>Recent activity</h3>
                <p>Jump back into your latest trips or add a new memory.</p>
                <a href="{{ route('trips.index') }}" class="button button-secondary">Browse Trips</a>
            </article>
        </div>
    </section>
@endsection
