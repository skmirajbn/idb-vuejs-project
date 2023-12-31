<?php

namespace App\Http\Controllers;

use App\Models\CartProductItem;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CartProductItemController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $productItems = CartProductItem::where('user_id', auth()->user()->id)->with('productItem.productConfigurations.variationOption.variation', 'productItem.product')->get();
        // return $productItems;
        return Inertia::render('Web/CartProductItem/Index', compact('productItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'product_item_id' => 'required',
            'quantity' => 'required',
        ]);
        $cartProductItem = CartProductItem::create([
            'product_item_id' => $request->product_item_id,
            'quantity' => $request->quantity,
            'user_id' => auth()->user()->id,
        ]);
        if ($cartProductItem) {
            return redirect()->route('cart.index')->with('success', '');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CartProductItem $cartProductItem) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartProductItem $cartProductItem) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartProductItem $cartProductItem) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartProductItem $cartProductItem) {
        //
    }

    public function createOrder() {
        DB::transaction(function () {
            $createdOrder = Order::create([
                'user_id' => auth()->user()->id,
                'status' => 'pending',
                'total' => 654,
                'payment_method_id' => 1,
                'delivery_address_id' => 1,
                'shipping_method_id' => 1,
            ]);

            // insert order products table
            // Get all the cart product items
            $cartProductItems = CartProductItem::where('user_id', auth()->user()->id)->get();

            foreach ($cartProductItems as $cartProductItem) {
                $orderedProduct = OrderProduct::create([
                    'order_id' => $createdOrder->id,
                    'product_item_id' => $cartProductItem->product_item_id,
                    'quantity' => $cartProductItem->quantity,
                    'price' => $cartProductItem->productItem->price,
                ]);
                $cartProductItem->delete();
            }

        });
        return redirect()->route('order.index')->with('success', '');
    }

    public function viewOrders() {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return Inertia::render('Web/Order/Index', compact('orders'));
    }
}
