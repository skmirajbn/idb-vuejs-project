<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartProductItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Models\CartProductItem;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Single Product Page
Route::get('/product/{id}', [HomeController::class, 'show'])->name('web.product.show');

// Cart
Route::get('/cart', [CartProductItemController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartProductItemController::class, 'store'])->name('cart.store');

// Create Order
Route::post('/create-order', [CartProductItemController::class, 'createOrder'])->name('cart.createOrder');

// View Orders
Route::get('/view-orders', [OrderController::class, 'index'])->name('order.index');
// View Single Order
Route::get('/view-order/{id}', [OrderController::class, 'show'])->name('order.show');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');
// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::get('/shop', [CartController::class, 'index'])->name('cart.shop');




Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/hello', function () {
    return "hello";
});
Route::get('/admin', function () {
    dd(auth()->user());
});

Route::get('/test', function () {
    dd(auth()->user());
});

require __DIR__ . '/auth.php';
