<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;

Route::get('/', function () {
    return view('welcome');
});

// Trip routes
Route::get('/trips', [TripController::class, 'index']);
Route::get('/trips/create', [TripController::class, 'create']);
Route::post('/trips', [TripController::class, 'store']);
Route::get('/trips/{id}', [TripController::class, 'show']);
Route::get('/trips/{id}/edit', [TripController::class, 'edit']);
Route::put('/trips/{id}', [TripController::class, 'update']);
Route::delete('/trips/{id}', [TripController::class, 'destroy']);