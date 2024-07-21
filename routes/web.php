<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $artwork = \App\Models\Asset::inRandomOrder()->get();
    return view('welcome', compact('artwork'));
});
