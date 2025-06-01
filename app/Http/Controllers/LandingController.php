<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class LandingController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('welcome', compact('properties'));
    }
}
