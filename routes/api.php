<?php
use Illuminate\Support\Facades\Route;

Route::get('/artwork', [\App\Http\Controllers\ArtworkController::class, 'index']);
Route::post('/artwork', [\App\Http\Controllers\ArtworkController::class, 'store']);
