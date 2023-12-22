<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::with('parentCategory')->get();
        return Inertia::render('Admin/Categories/Index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::with('parentCategory')->get();
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

        Category::create([
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
    public function show(Category $categories) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) {
        $categories = Category::with('parentCategory')->get();
        return Inertia::render('Admin/Categories/Edit', compact(['category', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category) {
        // update the category with validation
        // $request->validate([
        //     'category' => 'required',
        //     'description' => 'required',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        dd($request->all());
        // if image is included then move the image to images folder and update the database 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // generate a unique name for the image and save to the storage
            $imageName = uniqid() . '_' . mt_rand() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $category->image = $imageName;
        }
        $category->name = $request->category;
        $category->parent_category_id = $request->parent_category_id;
        $category->description = $request->description;
        $category->status = 1;
        $category->save();
        $categories = Category::with('parentCategory')->get();
        return Inertia::render('Admin/Categories/Edit', compact(['category', 'categories']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {
        //
    }
}
