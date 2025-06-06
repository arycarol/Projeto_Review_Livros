<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroUpdateRequest extends FormRequest
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
            'titulo'     => 'sometimes|required|string|max:255',
            'autor_id'   => 'sometimes|required|integer|exists:autor,id',
            'genero_id'  => 'sometimes|required|integer|exists:genero,id',
            'sinopse'    => 'sometimes|nullable|string',
        ];
    }
}
