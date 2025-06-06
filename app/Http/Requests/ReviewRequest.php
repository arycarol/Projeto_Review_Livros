<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nota' => 'required|integer|min:0|max:5',
            'comentario' => 'required|string|max:1024',
            'livro_id' => 'required|exists:livro,id',
            'usuario_id' => 'required|exists:user,id',
        ];
    }
}
