<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller {
    public function index() {
        $products = Product::with('category')->get();
        return Inertia::render('Index', compact('products'));
    }
}
