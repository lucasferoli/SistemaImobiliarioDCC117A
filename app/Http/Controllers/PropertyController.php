<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('admin/imoveisCrud', compact('properties'));
    }

        public function update(Property $property, Request $request)
        {

            $data = $request->all();
            
            $property->update($data);

            return redirect()->route('admin.imoveisCrud');
        }


        public function destroy(Property $property)
        {
            $property->delete();

            return redirect()->route('admin.imoveisCrud');
        }
    }
