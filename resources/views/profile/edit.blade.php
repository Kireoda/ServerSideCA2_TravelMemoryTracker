@extends('layouts.app')

@section('content')
    <section class="page">
        <header class="page-header">
            <h2>Profile</h2>
        </header>

        <div class="form-card">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="form-card" style="margin-top: 24px;">
            @include('profile.partials.update-password-form')
        </div>

        <div class="form-card" style="margin-top: 24px;">
            @include('profile.partials.delete-user-form')
        </div>
    </section>
@endsection