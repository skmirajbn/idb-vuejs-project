<?php

namespace App\Http\Controllers;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShippingMethodController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $shippingMethods = ShippingMethod::all();
        return Inertia::render('Admin/ShippingMethods/Index', compact('shippingMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return Inertia::render('Admin/ShippingMethods/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $shippingMethod = ShippingMethod::create($request->all());
        if ($shippingMethod) {
            return Inertia::render('Admin/ShippingMethods/Create', [
                'message' => 'success',
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingMethod $shippingMethod) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShippingMethod $shippingMethod) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShippingMethod $shippingMethod) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingMethod $shippingMethod) {
        //
    }
}
