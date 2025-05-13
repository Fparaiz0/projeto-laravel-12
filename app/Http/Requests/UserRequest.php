<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    // Regras de validação para o fomulário de cadastro de usuários
    public function rules(): array
    {
        $user = $this->route('user');
        return [
            'name' => 'required',
            // Se o email for diferente do email do usuário, então o email deve ser único
            'email' => 'required|email|unique:users,email,' . ($user ? $user->id : 'null'),
            'password' => 'required_if:password,!=null|min:6',
        ];
    }

    // Mensagens de erro para as regras de validação
    // Caso o usuário não preencha o campo nome, a mensagem de erro será "O campo nome é obrigatório!"
    // Caso o usuário não preencha o campo e-mail, a mensagem de erro será "O campo e-mail é obrigatório!"
    // Caso o usuário não preencha o campo e-mail com um endereço de e-mail válido, a mensagem de erro será "O campo e-mail deve ser um endereço de e-mail válido!"
    // Caso o usuário não preencha o campo e-mail com um endereço de e-mail que já está cadastrado, a mensagem de erro será "O e-mail já está cadastrado!"
    // Caso o usuário não preencha o campo senha, a mensagem de erro será "O campo senha é obrigatório!"
    // Caso o usuário não preencha o campo senha com menos de 6 caracteres, a mensagem de erro será "O campo senha deve ter no mínimo 6 caracteres!"
    public function messages(): array
    {
        return [
            'name.required' => "O campo nome é obrigatório!",
            'email.required' => "O campo e-mail é obrigatório!",
            'email.email' => "O campo e-mail deve ser um endereço de e-mail válido!",
            'email.unique' => "O e-mail já está cadastrado!",
            'password.required' => "O campo senha é obrigatório!",
            'password.min' => "O campo senha deve ter no mínimo :min caracteres!",
        ];
    }
}
