<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Thana;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ThanaController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $thanas = Thana::with('district')->get();
        return Inertia::render('Admin/Thanas/Index', compact('thanas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $districts = District::all();
        return Inertia::render('Admin/Thanas/Create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // validate
        $request->validate([
            'thana' => 'required',
            'district_id' => 'required',
            'delivery_charge' => 'required|numeric',
        ]);
        $thana = Thana::create([
            'name' => $request->thana,
            'district_id' => $request->district_id,
            'delivery_charge' => $request->delivery_charge
        ]);
        if ($thana) {
            return Inertia::render('Admin/Thanas/Create', [
                'message' => 'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Thana $thana) {
        $thana->load('district');
        return Inertia::render('Admin/Thanas/Show', compact('thana'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thana $thana) {
        $districts = District::all();
        return Inertia::render('Admin/Thanas/Edit', compact('thana', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thana $thana) {
        // validate
        $request->validate([
            'thana' => 'required',
            'district_id' => 'required',
            'delivery_charge' => 'required|numeric',
        ]);
        $thana = $thana->update([
            'name' => $request->thana,
            'district_id' => $request->district_id,
            'delivery_charge' => $request->delivery_charge
        ]);
        if ($thana) {
            return Inertia::render('Admin/Thanas/Edit', [
                'message' => 'success',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thana $thana) {
        $thana->delete();
        return redirect()->route('admin.thana.index');
    }
}
