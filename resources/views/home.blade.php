@extends('layouts.marketing')

@section('content')
    <section class="marketing-hero">
        <div class="marketing-hero-copy">
            <p class="eyebrow">Your travel memories, organised</p>
            <h1 class="marketing-hero-title">Turn every trip into a personal memory gallery.</h1>
            <p class="marketing-hero-lead">
                Create trips and keep everything in one clean place—memories are generated from your trip details.
            </p>

            <div class="marketing-hero-actions">
                @auth
                    <a href="{{ route('dashboard') }}" class="button">Go to dashboard</a>
                    <a href="{{ route('trips.index') }}" class="button button-secondary">Browse trips</a>
                @else
                    <a href="{{ route('register') }}" class="button">Get started</a>
                    <a href="{{ route('login') }}" class="button button-secondary">Log in</a>
                @endauth
            </div>

            <div class="marketing-hero-badges" aria-label="Key benefits">
                <span class="marketing-badge">Trips</span>
                <span class="marketing-badge">Memories</span>
                <span class="marketing-badge">Private by default</span>
            </div>
        </div>

        <div class="marketing-collage" aria-label="Trip photo collage">
            <div class="marketing-collage-tile marketing-collage-tile--a">
                <div class="marketing-collage-overlay">
                    <span class="card-chip">Trip cover</span>
                    <p class="marketing-collage-title">Barcelona</p>
                </div>
            </div>
            <div class="marketing-collage-tile marketing-collage-tile--b">
                <div class="marketing-collage-overlay">
                    <span class="card-chip">Gallery</span>
                    <p class="marketing-collage-title">Coast</p>
                </div>
            </div>
            <div class="marketing-collage-tile marketing-collage-tile--c">
                <div class="marketing-collage-overlay">
                    <span class="card-chip">Details</span>
                    <p class="marketing-collage-title">Street</p>
                </div>
            </div>
            <div class="marketing-collage-tile marketing-collage-tile--d">
                <div class="marketing-collage-overlay">
                    <span class="card-chip">Highlights</span>
                    <p class="marketing-collage-title">Sunset</p>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="page marketing-section">
        <header class="page-header">
            <div>
                <p class="eyebrow">Features</p>
                <h2>Designed for clarity</h2>
            </div>
        </header>

        <div class="marketing-feature-grid">
            <article class="marketing-feature">
                <h3>Trip gallery</h3>
                <p>Create, edit, and manage trips with a clean card layout.</p>
            </article>
            <article class="marketing-feature">
                <h3>Memories per trip</h3>
                <p>Memories are generated and grouped under each trip for easy browsing.</p>
            </article>
            <article class="marketing-feature">
                <h3>Validation built-in</h3>
                <p>Helpful server-side validation keeps your data consistent.</p>
            </article>
            <article class="marketing-feature">
                <h3>Secure access</h3>
                <p>Authentication and authorisation keep your content private.</p>
            </article>
        </div>
    </section>

    <section id="how" class="page marketing-section">
        <header class="page-header">
            <div>
                <p class="eyebrow">How it works</p>
                <h2>From trip to memories in minutes</h2>
            </div>
        </header>

        <ol class="marketing-steps">
            <li class="marketing-step">
                <span class="marketing-step-number">1</span>
                <div>
                    <h3>Create a trip</h3>
                    <p>Add a title, location, dates, and description.</p>
                </div>
            </li>
            <li class="marketing-step">
                <span class="marketing-step-number">2</span>
                <div>
                    <h3>Add trip details</h3>
                    <p>Upload photos and keep your trip description up to date.</p>
                </div>
            </li>
            <li class="marketing-step">
                <span class="marketing-step-number">3</span>
                <div>
                    <h3>Browse generated memories</h3>
                    <p>Memories are generated from your trip details and stay linked to the trip.</p>
                </div>
            </li>
        </ol>
    </section>

    <section id="demo" class="page marketing-section">
        <header class="page-header">
            <div>
                <p class="eyebrow">Demo</p>
                <h2>Try it quickly</h2>
            </div>
        </header>

        <div class="marketing-demo">
            <div>
                <p class="status-text">
                    If you seeded the database, you can log in with a demo account and explore the dashboard.
                </p>
                <div class="marketing-demo-actions">
                    @auth
                        <a href="{{ route('dashboard') }}" class="button">Open dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="button">Log in</a>
                        <a href="{{ route('register') }}" class="button button-secondary">Create account</a>
                    @endauth
                </div>
            </div>

            <div class="marketing-demo-card">
                <p class="marketing-demo-title">Seeded accounts</p>
                <ul class="marketing-demo-list">
                    <li><strong>Sarah Smith</strong> — <code>sarah.smith@example.com</code></li>
                    <li><strong>Mark Byrne</strong> — <code>mark.byrne@example.com</code></li>
                    <li>Password — <code>Password123!</code></li>
                </ul>
            </div>
        </div>
    </section>
@endsection
