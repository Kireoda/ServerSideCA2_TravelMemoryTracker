<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\MemoryController;

Route::get('/', function () {
    return redirect('/trips');
});

// Trip routes
Route::get('/trips', [TripController::class, 'index']);
Route::get('/trips/create', [TripController::class, 'create']);
Route::post('/trips', [TripController::class, 'store']);
Route::get('/trips/{trip}', [TripController::class, 'show']);
Route::get('/trips/{trip}/edit', [TripController::class, 'edit']);
Route::put('/trips/{trip}', [TripController::class, 'update']);
Route::delete('/trips/{trip}', [TripController::class, 'destroy']);
Route::resource('trips.memories', MemoryController::class);