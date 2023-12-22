<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriesController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Categories::with('parentCategory')->get();
        return Inertia::render('Admin/Categories/Index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Categories::with('parentCategory')->get();
        return Inertia::render('Admin/Categories/Create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // create the category with validation
        $request->validate([
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        // generate a unique name for the image and save to the storage
        $imageName = uniqid() . '_' . mt_rand() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        Categories::create([
            'name' => $request->category,
            'parent_category_id' => $request->parent_category_id,
            'image' => $imageName,
            'description' => $request->description,
            'status' => 1,
        ]);
        return Inertia::render('Admin/Categories/Create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories) {
        //
    }
}
