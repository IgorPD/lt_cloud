<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'excerpt'  => 'nullable|string',
            'status' => 'required|in:ativado,desativado',
            'authors' => 'required|array',
            'published_at' => 'required|date',
        ];
    }
}
