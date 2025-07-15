<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Transaction; 

class IndividualController extends Controller
{
    public function index($id)
    {
        $property = Property::find($id);

        return view('imovelIndividual', compact('property'));
    }

    public function store($id, Request $request)
    {
        Transaction::create([
            'user_id' => $request->user_id,
            'property_id' => $id,
            'totalPrice' => $request->totalPrice,
        ]);

        return redirect()->to("postIndividual/{$id}");
    }
}
