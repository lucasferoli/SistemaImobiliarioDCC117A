<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $properties = Property::where('user_id', $user->id)->get();

        return view('dashboardUser', compact('properties'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        
        Property::create([
            'title'       => $request->title,
            'description' => $request->description,
            'address'     => $request->address,
            'buyPrice'    => $request->buyPrice,
            'rentPrice'   => $request->rentPrice,
            'image'       => $request->image,
            'user_id'     => $user->id,
        ]);

        return redirect()->route('/dashboardUser');
    }

    public function update(Property $property, Request $request)
    {
        $data = $request->all();
        $property->update($data);

        return redirect()->route('/dashboardUser');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('/dashboardUser');
    }
}
