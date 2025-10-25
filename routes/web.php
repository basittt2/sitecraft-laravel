<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
use App\Http\Controllers\ProductController;
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Login & Register routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
