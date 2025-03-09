<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request -> validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        Auth::login($user);
        return to_route('articles.index')->with('success', 'Cadastro realizado com sucesso.');
    }
}
