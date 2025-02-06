<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response("");
});

Route::get('/direct', \App\Http\Controllers\DirectResponseController::class);
Route::get('/about-me/{id}', \App\Http\Controllers\AboutMeController::class);
Route::get('/cache/about-me/{id}', \App\Http\Controllers\AboutMeCacheController::class);
