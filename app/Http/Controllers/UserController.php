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
        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>$request->password,
            'role' =>$request->role,
        ]);

        return redirect()->route('admin.usuariosCrud');
    }

    public function update(User $user, Request $request)
    {
        $data = $request->all();
        $user->update($data);

        return redirect()->route('admin.usuariosCrud');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('admin.usuariosCrud');
    }
}
