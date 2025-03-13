<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/custom', function () {
    return "This is a custom route!";
});

Route::get('/home', [HomeController::class, 'index']);


