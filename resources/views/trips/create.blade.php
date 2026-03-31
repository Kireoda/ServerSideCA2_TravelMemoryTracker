@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>Create New Trip</h2>
            <a href="/trips" class="button">Back to Trips</a>
        </header>

        <form method="POST" action="/trips" class="form">
            @csrf

            <div class="form-group">
                <label for="title">Trip Title</label>
                <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="e.g. Summer in Spain"
                        required
                >
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input
                        type="text"
                        id="location"
                        name="location"
                        placeholder="e.g. Barcelona"
                        required
                >
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            required
                    >
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input
                            type="date"
                            id="end_date"
                            name="end_date"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                        id="description"
                        name="description"
                        placeholder="Write about your trip..."
                ></textarea>
            </div>

            <div class="form-actions">
                <button type="submit">Create Trip</button>
                <a href="/trips" class="button">Cancel</a>
            </div>
        </form>
    </section>
@endsection