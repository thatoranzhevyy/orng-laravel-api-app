<?php

use App\Models\Artwork;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $artwork = Artwork::take(1)->with('assets')->first();
    return view('welcome', compact('artwork'));
});
