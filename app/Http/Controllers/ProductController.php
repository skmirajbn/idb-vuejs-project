<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::with('category')->get();
        return Inertia::render('Admin/Products/Index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::with('variations.variationOptions')->get();
        return Inertia::render('Admin/Products/Create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // validating the request
        $request->validate([
            'hasVariation' => 'required|boolean',
            'product' => 'required|array',
            'product.name' => 'required|string',
            'product.description' => 'required|string',
            'product.category_id' => 'required|numeric',
            'product.image' => 'required|string',
            'product.price' => 'required|numeric',
            'product.stock' => 'required|numeric',
            'product.status' => 'required|numeric',
            'product.productItems' => 'array', // Made productItems optional
            'product.productItems.*.product_id' => 'required_with:product.productItems|numeric',
            'product.productItems.*.image' => 'required_with:product.productItems|string',
            'product.productItems.*.stock' => 'required_with:product.productItems|numeric',
            'product.productItems.*.price' => 'required_with:product.productItems|numeric',
            'product.productItems.*.productConfigurations' => 'required_with:product.productItems|array',
            'product.productItems.*.productConfigurations.*.prodcut_item_id' => 'required_with:product.productItems|numeric',
            'product.productItems.*.productConfigurations.*.variation_id' => 'required_with:product.productItems|numeric',
            'product.productItems.*.productConfigurations.*.variation_option_id' => 'required_with:product.productItems|numeric',
            'remember' => 'required|boolean',
        ]);

        return $request->all();

        // if image is available save to storage and save the image name to database
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $validated['image'] = $imageName;
        }
        $product = Product::create($validated);
        if ($product) {
            return Inertia::render('Admin/Products/Index',
                [
                    'message' => 'success',
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        //
    }
}
