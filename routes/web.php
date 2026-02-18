<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('menus', MenuController::class);
Route::resource('products', ProductController::class);
Route::resource('menu-products', MenuProductController::class);
