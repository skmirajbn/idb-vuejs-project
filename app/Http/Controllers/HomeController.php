<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller {
    public function index() {
        $products = Product::with('category', 'productItems.productConfigurations.variationOption.variation')->get();
        return Inertia::render('Index', compact('products'));
    }

    /**
     * Show a product.
     *
     * @param int $id The ID of the product to show.
     * @return \Inertia\Response The rendered response for the product show page.
     */
    public function show($id) {
        $product = Product::find($id);
        $product->load('category', 'productItems.productConfigurations.variationOption.variation.variationOptions');
        // dd($product->toArray());
        return Inertia::render('Web/Product/Show', compact('product'));
    }
}
