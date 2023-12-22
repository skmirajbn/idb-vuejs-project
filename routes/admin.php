<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DistrictController;
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
Route::get('/district/all', [DistrictController::class, 'index'])->name('admin.district.all');
Route::get('/district/add', [DistrictController::class, 'create'])->name('admin.district.add');
Route::post('/district/add', [DistrictController::class, 'store'])->name('admin.district.store');
Route::delete('/district/delete/{district}', [DistrictController::class, 'destroy'])->name('admin.district.delete');
Route::get('/district/edit/{district}', [DistrictController::class, 'edit'])->name('admin.district.edit');
Route::put('/district/edit/{district}', [DistrictController::class, 'update'])->name('admin.district.update');