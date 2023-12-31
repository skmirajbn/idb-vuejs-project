<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DistrictController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $districts = District::all();
        // if this is an api call for json then return json data check request header if json expect
        return Inertia::render('Admin/Districts/Index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return Inertia::render('Admin/Districts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // validation of request
        $request->validate([
            'district' => 'required',
        ]);
        $district = District::create([
            'name' => $request->district
        ]);
        if ($district) {
            // response json of inertia
            return Inertia::render('Admin/Districts/Create', [
                'message' => 'success',
            ]);
        }


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
        return Inertia::render('Admin/Districts/Edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district) {
        // validation of request
        $request->validate([
            'district' => 'required',
        ]);
        $district = $district->update([
            'name' => $request->district
        ]);
        if ($district) {
            $message = 'success';
            // response json of inertia
            return Inertia::render('Admin/Districts/Edit', compact(['district', 'message']));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district) {
        // delete the district
        $district->delete();
        // return to all
        return redirect()->route('admin.district.index');

    }
}
