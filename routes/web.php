<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::get('/nutritions', function () {
    return view('nutritions.index');
})->name('nutritions.index');

Route::resource('blogs', BlogsController::class)->only('index', 'show');
Route::resource('recipes', RecipesController::class);
