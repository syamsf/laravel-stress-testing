<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-me/{id}', \App\Http\Controllers\AboutMeController::class);
