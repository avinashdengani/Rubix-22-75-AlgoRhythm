<?php

use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('home');
});


Route::get('/nutritions', function () {
    return view('nutritions.index');
});

Route::resource('recipes', RecipesController::class);
