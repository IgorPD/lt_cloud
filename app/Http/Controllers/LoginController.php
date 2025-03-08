<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            # Se não houver uma URL armazenada, redireciona para 'dashboard' TODO
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email inválido.'
        ])->onlyInput('email');
    }
}
