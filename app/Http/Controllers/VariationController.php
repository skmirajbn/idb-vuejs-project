<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Variation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VariationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $variations = Variation::with('category')->get();
        return Inertia::render('Admin/Variations/Index', compact('variations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::all();
        return Inertia::render('Admin/Variations/Create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
        $variation = Variation::create([
            'name' => $request->name,
            'category_id' => $request->category_id
        ]);
        if ($variation) {
            return Inertia::render('Admin/Variations/Create', [
                'message' => 'success',
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Variation $variation) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variation $variation) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variation $variation) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variation $variation) {
        $variation->delete();
        return redirect()->route('admin.variation.index');
    }
}
