@extends('layouts.app')

@section('content')
    <section>
        <header>
            <h2>Create Trip</h2>
        </header>

        <form method="POST" action="/trips">
            @csrf

            <div>
                <label>Trip Title</label>
                <input type="text" name="title" required>
            </div>

            <div>
                <label>Location</label>
                <input type="text" name="location" required>
            </div>

            <div>
                <label>Start Date</label>
                <input type="date" name="start_date" required>
            </div>

            <div>
                <label>End Date</label>
                <input type="date" name="end_date">
            </div>

            <div>
                <label>Description</label>
                <textarea name="description"></textarea>
            </div>

            <button type="submit">Create Trip</button>
        </form>
    </section>
@endsection