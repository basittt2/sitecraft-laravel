<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductAdminController;

// HOME PAGE
Route::get('/', function () {
    return view('home');
})->name('home');

// PRODUCTS PAGE 
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');


Route::get('/admin/products', [ProductAdminController::class, 'index'])
    ->name('products.admin.index');

Route::get('/admin/products/create', [ProductAdminController::class, 'create'])
    ->name('admin.products.create');


Route::get('/admin/products/edit', [ProductAdminController::class, 'edit'])
    ->name('admin.products.edit');


Route::get('/admin/products/delete', [ProductAdminController::class, 'destroy'])
    ->name('admin.products.delete');

    


// CONTACT PAGE
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// CART PAGE (localStorage-powered)
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// CHECKOUT PAGE
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// THANK YOU PAGE (after order completion)
Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');

Route::get('/dashboard', function () {
    // Route kept for compatibility, but always send logged-in users to home
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
