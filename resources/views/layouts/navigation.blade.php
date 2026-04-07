<header class="site-header">
    <div class="header-inner">
        <a href="{{ route('dashboard') }}" class="brand">
            Travel Memory Tracker
        </a>

        <nav class="main-nav">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('trips.index') }}" class="nav-link {{ request()->routeIs('trips.*') ? 'active' : '' }}">
                Trips
            </a>
        </nav>

        <div class="user-actions">
            <span>{{ Auth::user()->name }}</span>
            <a href="{{ route('profile.edit') }}" class="button button-secondary">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="button button-danger">Log Out</button>
            </form>
        </div>
    </div>
</header>
