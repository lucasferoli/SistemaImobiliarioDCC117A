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
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/propertyImage'), $imageName);
            $imagePath = 'assets/propertyImage/' . $imageName;
        }

        Property::create([
            'title'       => $request->title,
            'description' => $request->description,
            'address'     => $request->address,
            'buyPrice'    => $request->buyPrice,
            'rentPrice'   => $request->rentPrice,
            'image'       => $imagePath,
            'user_id'     => $request->user_id,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function update(Property $property, Request $request)
    {
        $data = $request->all();

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($property->image && file_exists(public_path($property->image))) {
                unlink(public_path($property->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/propertyImage'), $imageName);
            $data['image'] = 'assets/propertyImage/' . $imageName;
        }

        $property->update($data);

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Property $property)
    {
        // Delete image file if exists
        if ($property->image && file_exists(public_path($property->image))) {
            unlink(public_path($property->image));
        }

        $property->delete();

        return redirect()->route('admin.dashboard');
    }
}
