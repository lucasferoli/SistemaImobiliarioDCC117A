<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $properties = \App\Models\Property::where('user_id', $user->id)->get();

        return view('dashboardUser', compact('properties'));
    }
}
