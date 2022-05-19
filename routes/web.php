<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'home']);

Route::get('/product_details', function () {
    return view('product_details');
});

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::resource('/products', ProductController::class);
Route::resource('/users', UserController::class);
Route::get('/admin_products',[ProductController::class, 'addProduct'])->middleware('auth');
Route::get('/edit_product/{id}', [ProductController::class, 'editProduct']);
Route::get('/delete_product/{id}', [ProductController::class, 'destroy']);
Route::put('/update_product/{id}', [ProductController::class, 'update']);
Route::post('/add_to_cart', [ProductController::class, 'addToCart']);
Route::get('/cart',[ProductController::class, 'viewCart']);
Route::get('/remove_item/{id}',[ProductController::class, 'removeItem']);