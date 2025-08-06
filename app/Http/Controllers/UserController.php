<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.usuariosCrud', compact('users'));
    }

    public function store(Request $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/profileImage'), $imageName);
            // Save relative path
            $imagePath = 'assets/profileImage/' . $imageName;
        }

        User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'password'=> bcrypt($request->password),
            'role'    => $request->role,
            'image'   => $imagePath,
        ]);

        return redirect()->route('admin.usuariosCrud');
    }

public function update(User $user, Request $request)
{
    $data = $request->all();
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/profileImage'), $imageName);
        $data['image'] = $imageName;
    }

    $user->update($data);

    return redirect()->route('admin.usuariosCrud');
}


    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('admin.usuariosCrud');
    }
}

