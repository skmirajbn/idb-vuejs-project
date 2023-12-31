<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\ProductConfiguration;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $products = Product::with('category', 'productItems.productConfigurations.variationOption.variation')->get();
        // return $products;
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
        // dd($request->all());
        // validating the request
        $request->validate([
            'hasVariation' => 'required|boolean',
            'product' => 'required|array',
            'product.name' => 'required|string',
            'product.description' => 'required|string',
            'product.category_id' => 'required|numeric',
            'product.image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product.price' => 'required|numeric',
            'product.stock' => $request->hasVariation == 0 ? 'required|numeric' : 'numeric|nullable',
            'product.status' => 'required|numeric',
            'product.productItems' => 'array',
            'product.productItems.*.image' => 'required_with:product.productItems|required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product.productItems.*.stock' => 'required_with:product.productItems|numeric',
            'product.productItems.*.price' => 'required_with:product.productItems|numeric',
            'product.productItems.*.productConfigurations' => 'required_with:product.productItems|array',
            'product.productItems.*.productConfigurations.*.variation_id' => 'required_with:product.productItems|numeric',
            'product.productItems.*.productConfigurations.*.variation_option_id' => 'required_with:product.productItems|numeric',
            'remember' => 'required|boolean',
        ], [
            'hasVariation.required' => 'The hasVariation field is required.',
            'hasVariation.boolean' => 'The hasVariation field must be a boolean.',

            'product.required' => 'The product field is required.',
            'product.array' => 'The product field must be an array.',

            'product.name.required' => 'The product name field is required.',
            'product.name.string' => 'The product name must be a string.',

            'product.description.required' => 'The product description field is required.',
            'product.description.string' => 'The product description must be a string.',

            'product.category_id.required' => 'The category ID field is required.',
            'product.category_id.numeric' => 'The category ID must be a number.',

            'product.image.required' => 'The product image field is required.',
            'product.image.file' => 'The product image must be a file.',
            'product.image.mimes' => 'The product image must be of type: jpeg, png, jpg, gif, svg.',
            'product.image.max' => 'The product image may not be greater than 2048 kilobytes.',

            'product.price.required' => 'The product price field is required.',
            'product.price.numeric' => 'The product price must be a number.',

            'product.stock.required' => 'The product stock field is required.',
            'product.stock.numeric' => 'The product stock must be a number.',

            'product.status.required' => 'The product status field is required.',
            'product.status.numeric' => 'The product status must be a number.',

            'product.productItems.array' => 'The product items must be an array.',

            'product.productItems.*.image.required_with' => 'The image field is required when product items are present.',
            'product.productItems.*.image.required' => 'The image field is required for each product item.',
            'product.productItems.*.image.file' => 'The image must be a file for each product item.',
            'product.productItems.*.image.mimes' => 'The image must be of type: jpeg, png, jpg, gif, svg for each product item.',
            'product.productItems.*.image.max' => 'The image for each product item may not be greater than 2048 kilobytes.',

            'product.productItems.*.stock.required_with' => 'The stock field is required when product items are present.',
            'product.productItems.*.stock.numeric' => 'The stock must be a number for each product item.',

            'product.productItems.*.price.required_with' => 'The price field is required when product items are present.',
            'product.productItems.*.price.numeric' => 'The price must be a number for each product item.',

            'product.productItems.*.productConfigurations.required_with' => 'The product configurations field is required when product items are present.',
            'product.productItems.*.productConfigurations.array' => 'The product configurations must be an array for each product item.',

            'product.productItems.*.productConfigurations.*.variation_id.required_with' => 'The variation ID field is required when product items are present.',
            'product.productItems.*.productConfigurations.*.variation_id.numeric' => 'The variation ID must be a number for each product item.',

            'product.productItems.*.productConfigurations.*.variation_option_id.required_with' => 'The variation option ID field is required when product items are present.',
            'product.productItems.*.productConfigurations.*.variation_option_id.numeric' => 'The variation option ID must be a number for each product item.',

            'remember.required' => 'The remember field is required.',
            'remember.boolean' => 'The remember field must be a boolean.',
        ]);

        DB::transaction(function () use ($request) {
            if ($request->hasVariation == 0) {
                if ($request->product) {
                    $product = $request->product;

                    $image = $product['image'];
                    $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/images', $imageName);


                    // Insert in the Product Table
                    $createdProduct = Product::create([
                        'name' => $product['name'],
                        'description' => $product['description'],
                        'category_id' => $product['category_id'],
                        'price' => $product['price'],
                        'stock' => $product['stock'],
                        'image' => $imageName,
                        'status' => $product['status'],
                    ]);

                    // Insert in the ProductItem Table
                    $createdProductItem = ProductItem::create([
                        'product_id' => $createdProduct->id,
                        'price' => $product['price'],
                        'stock' => $product['stock'],
                        'image' => $imageName,
                    ]);

                    return Inertia::render('Admin/Products/Create', [
                        'message' => 'success',
                    ]);
                }
            }
        });

        DB::transaction(function () use ($request) {

            if ($request->hasVariation == 1) {
                if ($request->product) {
                    $product = $request->product;
                    $image = $product['image'];
                    $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/images', $imageName);

                    $createdProduct = Product::create([
                        'name' => $product['name'],
                        'description' => $product['description'],
                        'category_id' => $product['category_id'],
                        'price' => $product['price'],
                        'stock' => $product['stock'],
                        'image' => $imageName,
                        'status' => $product['status'],
                    ]);
                    $productItems = $product['productItems'];
                    // Insert in the ProductItem Table
                    foreach ($productItems as $productItem) {

                        $itemImage = $productItem['image'];
                        $itemImageName = uniqid() . '_' . time() . '.' . $itemImage->getClientOriginalExtension();
                        $itemImage->storeAs('public/images', $itemImageName);



                        $createdProductItem = ProductItem::create([
                            'product_id' => $createdProduct->id,
                            'price' => $productItem['price'],
                            'stock' => $productItem['stock'],
                            'image' => $itemImageName,
                        ]);

                        // Insert in the ProductConfiguration Table
                        $productConfigurations = $productItem['productConfigurations'];
                        foreach ($productConfigurations as $productConfiguration) {
                            ProductConfiguration::create([
                                'product_item_id' => $createdProductItem->id,
                                'variation_option_id' => $productConfiguration['variation_option_id'],
                            ]);
                        }
                    }
                    return Inertia::render('Admin/Products/Create', [
                        'message' => 'success',
                    ]);
                }
            }

        });

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        $product->load('category', 'productItems.productConfigurations.variationOption.variation');
        return Inertia::render('Admin/Products/Show', [
            'product' => $product,
        ]);
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
        // delete will relations
        $product->delete();
        return redirect()->route('admin.product.index')->with('message', 'Product deleted successfully');
    }
}
