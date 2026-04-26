<header class="site-header">
    <div class="header-inner">
        <a href="{{ route('dashboard') }}" class="brand">
                <img src="{{ asset('images/logo.jpg') }}" alt="Travel Memory Tracker" style="height: 40px; width: auto;">
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

        <button class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="user-actions" id="userActions">
            @if(Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover;">
            @endif
            <span>{{ Auth::user()->name }}</span>
            <a href="{{ route('profile.edit') }}" class="button button-secondary">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="button button-danger">Log Out</button>
            </form>
        </div>
    </div>
</header>