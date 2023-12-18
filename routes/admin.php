<?php

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

Route::get('/dashboard', function () {
    $user = auth()->user();
    dd($user);
});
