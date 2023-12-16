<?php

use Illuminate\Http\Request;
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
    echo "dashboard";
});
