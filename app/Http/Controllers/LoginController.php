<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    # RedirectResponse indicao tipo de retorno da minha função
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return to_route('dashboard')->with('success', 'Login realizado com sucesso.');
        }

        return back()->withErrors([
            'email' => 'Email e/ou senha inválidos.'
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login')->with('success', 'Você saiu com sucesso.');
    }
}
