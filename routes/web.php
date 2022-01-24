<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\StoreroomController;
use App\Http\Controllers\UserProductController;
use App\Models\Storeroom;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::resource('blogs', BlogsController::class)->only('index', 'show');
Route::post('blogs/{id}/comment', [BlogsController::class, 'comment'])->name('blogs.comment');
Route::put('blogs/{id}/dislike', [BlogsController::class, 'dislike'])->name('blog.dislike');
Route::put('blogs/{id}/like', [BlogsController::class, 'like'])->name('blog.like');
Route::post('blogComments/{id}/ajax', [BlogsController::class, 'getComments'])->name('user.getComments');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/grocery', [UserProductController::class, 'grocery'])->name('grocery.index');

Auth::routes();

Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');

Route::get('/nutritions', function () {
    return view('nutritions.index');
})->name('nutritions.index');

Route::resource('products', ProductsController::class);
Route::post('purchasedProducts/ajax', [UserProductController::class, 'getPurchasedProductsJson'])->name('user.purchasedProducts');
Route::post('products/ajax', [ProductsController::class, 'getProductsForCategory'])->name('products.getDataForCategory');


Route::resource('recipes', RecipesController::class);

Route::resource('storeroom', StoreroomController::class)->only('index');
Route::delete('storeroom/{storeroom}/delete', [UserProductController::class, 'deleteProduct'])->name('user.deleteProduct');


Route::post('userProducts/ajax', [UserProductController::class, 'getGroceryList'])->name('user.getGroceryList');
Route::resource('users.products', UserProductController::class);

Route::put('users/{user}/products/{product}/mark-as-purchased', [UserProductController::class, 'markAsPurchased'])->name('users.products.mark-as-purchased');
Route::put('users/{user}/products/{product}/mark-as-consumed', [UserProductController::class, 'markAsConsumed'])->name('users.products.mark-as-consumed');
Route::post('users/{user}/purchase', [UserProductController::class, 'purchase'])->name('users.products.purchase');


