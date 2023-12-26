<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductItemController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $products = Product::with('category.variations.variationOptions')->get();
        return Inertia::render('Admin/ProductItems/Create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // validating the request
        $request->validate([
            'product_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $productItem = ProductItem::create([
            'product_id' => $request->product_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        if ($productItem) {
            return Inertia::render('Admin/ProductItems/Create', [
                'message' => 'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductItem $productItem) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductItem $productItem) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductItem $productItem) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductItem $productItem) {
        //
    }


}
