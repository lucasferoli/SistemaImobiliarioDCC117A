<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class AdminController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('admin.dashboard', compact('properties'));
    }

    public function store(Request $request)
    {
        Property::create([
            'title'       => $request->title,
            'description' => $request->description,
            'address'     => $request->address,
            'buyPrice'    => $request->buyPrice,
            'rentPrice'   => $request->rentPrice,
            'image'       => $request->image,
            'user_id'     => $request->user_id,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function update(Property $property, Request $request)
    {
        $data = $request->all();
        $property->update($data);

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('admin.dashboard');
    }
}
