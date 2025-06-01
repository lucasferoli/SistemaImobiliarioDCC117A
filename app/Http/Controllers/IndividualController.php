<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class IndividualController extends Controller
{
    public function index($id)
    {
        $property = Property::find($id);

        return view('imovelIndividual', compact('property'));
    }
}
