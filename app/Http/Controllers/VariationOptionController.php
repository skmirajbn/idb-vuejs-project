<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Models\VariationOption;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VariationOptionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $variationOptions = VariationOption::with('variation')->get();
        return Inertia::render('Admin/VariationOptions/Index', compact('variationOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $variations = Variation::with('category')->get();
        return Inertia::render('Admin/VariationOptions/Create', compact('variations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $variationOption = VariationOption::create($request->all());
        if ($variationOption) {
            return Inertia::render('Admin/VariationOptions/Create', [
                'message' => 'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VariationOption $variationOption) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VariationOption $variationOption) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VariationOption $variationOption) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VariationOption $variationOption) {
        $variationOption->delete();
        return redirect()->route('admin.variationOption.index');
    }
}
