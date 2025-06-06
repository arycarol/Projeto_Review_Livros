<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewUpdateRequest extends FormRequest
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
            'livro_id'    => 'sometimes|required|integer|exists:livro,id',
            'usuario_id'  => 'sometimes|required|integer|exists:user,id',
            'nota'        => 'sometimes|required|integer|min:0|max:10',
            'comentario'  => 'sometimes|required|string',
        ];
    }
}
