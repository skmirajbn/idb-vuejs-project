<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductConfiguration;
use App\Models\ProductItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        dd($request->all());

        DB::beginTransaction();

        try {
            $request->validate([
                'product_id' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'variation_option_id' => 'required',
            ]);

            // if image is available save to storage and save the image name to database
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
            }

            $productItem = ProductItem::create([
                'product_id' => $request->product_id,
                'price' => $request->price,
                'stock' => $request->quantity,
                'image' => $imageName,
            ]);

            $productConfiguration = ProductConfiguration::create([
                'product_item_id' => $productItem->id,
                'variation_option_id' => $request->variation_option_id,
            ]);

            DB::commit();

            if ($productItem && $productConfiguration) {
                return Inertia::render('Admin/ProductItems/Create', [
                    'message' => 'success',
                ]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
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
