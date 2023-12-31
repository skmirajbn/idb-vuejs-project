<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller {
    public function index() {
        $orders = Order::where('user_id', auth()->user()->id)->with('orderProducts.productItem.product', 'orderProducts.productItem.productConfigurations.variationOption.variation')->get();
        // return $orders;
        return Inertia::render('Web/Order/Index', compact('orders'));
    }
    public function show($id) {
        $order = Order::find($id);
        $order->load('orderProducts.productItem.product', 'orderProducts.productItem.productConfigurations.variationOption.variation');
        return Inertia::render('Web/Order/Show', compact('order'));


    }
}
