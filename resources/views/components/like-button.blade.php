@props([
    'trip',
    'memory',
    'size' => 'md', // md|sm
])

@php
    $isLiked = (bool) ($memory->liked ?? false);
    $sizeClass = $size === 'sm' ? 'like-toggle--sm' : '';
@endphp

<form method="POST" action="{{ route('trips.memories.like', [$trip, $memory]) }}" class="like-toggle-form">
    @csrf
    <button
        type="submit"
        class="like-toggle {{ $sizeClass }} {{ $isLiked ? 'is-liked' : '' }}"
        aria-pressed="{{ $isLiked ? 'true' : 'false' }}"
        title="{{ $isLiked ? 'Unlike memory' : 'Like memory' }}"
    >
        <span class="like-toggle-icon" aria-hidden="true"></span>
        <span class="like-toggle-label">{{ $isLiked ? 'Liked' : 'Like' }}</span>
    </button>
</form>

