<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class UserDashboardController extends Controller
{
    public function index()
    {
        $properties = Property->get();

        return view('dashboardUser', compact('properties'));
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
            'user_id'     => $user->id,
        ]);

        return redirect()->route('dashboardUser');
    }

    public function update(Property $property, Request $request)
    {
        $user = auth()->user();
        $data = $request->all();

        if ($property->user_id !== $user->id) {
            abort(403);
        }

        if ($request->hasFile('image')) {
            if ($property->image && file_exists(public_path($property->image))) {
                unlink(public_path($property->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/propertyImage'), $imageName);
            $data['image'] = 'assets/propertyImage/' . $imageName;
        }

        $property->update($data);

        return redirect()->route('dashboardUser');
    }

    public function destroy(Property $property)
    {
        $user = auth()->user();

        if ($property->user_id !== $user->id) {
            abort(403);
        }

        if ($property->image && file_exists(public_path($property->image))) {
            unlink(public_path($property->image));
        }

        $property->delete();

        return redirect()->route('dashboardUser');
    }
}
