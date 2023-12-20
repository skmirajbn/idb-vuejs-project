<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DistrictController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Inertia::render('Admin/Districts/All');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return Inertia::render('Admin/Districts/Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // validation of request
        $request->validate([
            'district' => 'required',
        ]);
        // response json of inertia
        return Inertia::render('Admin/Districts/Add', [
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district) {
        //
    }
}
