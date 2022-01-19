<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\UserProductController;
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

Route::get('/grocery', [UserProductController::class, 'grocery'])->name('grocery.index');

Route::resource('blogs', BlogsController::class)->only('index', 'show');
Route::resource('recipes', RecipesController::class);
Route::resource('users.products', UserProductController::class);
Route::put('users/{user}/products/{product}/mark-as-purchased', [UserProductController::class, 'markAsPurchased'])->name('users.products.mark-as-purchased');

Route::resource('products', ProductsController::class);
Route::post('products/ajax', [ProductsController::class, 'getProductsForCategory'])->name('products.getDataForCategory');

Route::post('userProducts/ajax', [UserProductController::class, 'getGroceryList'])->name('user.getGroceryList');




