<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'nullable|required_with:new_password|string',
            'new_password' => 'nullable|string|min:8|confirmed',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Handle image upload
        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/profileImage'), $imageName);
            $user->image = 'assets/profileImage/' . $imageName;
        }

        // Handle password change
        if (!empty($validated['new_password'])) {
            if (!\Hash::check($validated['current_password'], $user->password)) {
                return back()->withErrors(['current_password' => 'Senha atual incorreta.'])->withInput();
            }
            $user->password = bcrypt($validated['new_password']);
        }

        $user->save();

        return redirect()->route('/profile')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy()
    {
        $user = auth()->user();
        $user->delete();
        return redirect()->route('login');
    }
}
