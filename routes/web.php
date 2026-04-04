<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\MemoryController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect('/trips');
});
Route::get('/dashboard', function () {
    return redirect('/trips');
})->name('dashboard');
Route::middleware('auth')->group(function () {

    Route::resource('trips', TripController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';