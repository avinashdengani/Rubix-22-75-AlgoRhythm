<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/nutritions', function () {
    return view('nutritions.index');
})->name('nutritions.index');

Route::resource('blogs', BlogsController::class)->only('index');
Route::resource('recipes', RecipesController::class);
