<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            // A regra 'unique:authors,email,{id}' garante que o e-mail seja único na tabela 'authors',
            // mas ignora a verificação para o autor sendo atualizado, permitindo que ele mantenha seu e-mail.
            'email' => 'required|email|unique:authors,email,' . $this->route('author')->id,
            'bio' => 'nullable|string',
            'status' => 'required|in:ativado,desativado',
        ];
    }
}
