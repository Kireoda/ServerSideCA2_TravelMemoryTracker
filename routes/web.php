<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\MemoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    $userId = auth()->id();

    $recentTrips = \App\Models\Trip::where('user_id', $userId)
        ->with('images')
        ->withCount(['images', 'memories'])
        ->latest()
        ->take(4)
        ->get();

    $tripCount = \App\Models\Trip::where('user_id', $userId)->count();
    $photoCount = \App\Models\TripImage::whereHas('trip', fn ($query) => $query->where('user_id', $userId))->count();
    $likedCount = \App\Models\Memory::whereHas('trip', fn ($query) => $query->where('user_id', $userId))
        ->where('liked', true)
        ->count();

    return view('dashboard', compact('recentTrips', 'tripCount', 'photoCount', 'likedCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/logout', function (Request $request) {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('trips', TripController::class);
    Route::resource('trips.memories', MemoryController::class)->only(['index', 'show']);
    Route::post('trips/{trip}/memories/{memory}/like', [MemoryController::class, 'toggleLike'])->name('trips.memories.like');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
