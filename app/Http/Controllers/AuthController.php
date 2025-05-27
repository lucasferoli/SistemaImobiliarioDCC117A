<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Checa role do usuario
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/dashboard');
            } elseif ($user->role === 'user') {
                return redirect('/perfil');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Tipo de usuário desconhecido.',
                ])->onlyInput('email');
            }
        }

        return back()->withErrors([
            'email' => 'As credenciais não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
