<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'livro_id'   => 'required|exists:livro,id',
            'usuario_id'    => 'required|exists:user,id',
            'nota'       => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string|max:1000',
        ];
    }
}
