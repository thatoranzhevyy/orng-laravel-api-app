<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $artwork = \App\Models\Asset::inRandomOrder()->first();
    return view('welcome', compact('artwork'));
});
