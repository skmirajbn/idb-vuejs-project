<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\ThanaController;
use App\Http\Controllers\UserController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|Here is only the routes of Admin
|
*/

Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Crud Districts
Route::resource('/district', DistrictController::class)->names('admin.district');
Route::resource('/thana', ThanaController::class)->names('admin.thana');
Route::resource('/category', CategoryController::class)->names('admin.category');
Route::resource('/user', UserController::class)->names('admin.user');
Route::resource('/shipping-method', ShippingMethodController::class)->names('admin.shipping-method');
