<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseBatchRequest extends FormRequest
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

    // Regras de validação para o fomulário de cadastro de turmas
    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }

    // Mensagens de erro para as regras de validação
    // Caso o usuário não preencha o campo nome, a mensagem de erro será "O campo nome é obrigatório!"
    public function messages(): array
    {
        return [
            'name.required' => "O campo nome é obrigatório!",
        ];
    }
}
