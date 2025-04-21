<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Listar os usuários
    public function index()
    {
        // Recuperar os registros do banco de dados
        $users = User::orderBy('id', 'DESC')->get();

        // Carregar a view
        return view('users.index', ['users' => $users]);
    }

    // Visualizar os detalhes do usuário.
    public function show(User $user)
    {
        // Carregar a view
        return view('users.show', ['user' => $user]);
    }

    // Carregar o formulário de cadastro de usuários.
    public function create()
    {
        // Carregar a view
        return view('users.create');
    }

    // Cadastrar no banco de dados o novo usuário.
    public function store(UserRequest $request)
    {
        try {
            // Cadastrar no banco de dados na tabela usuários 
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Erro ao cadastrar o usuário!');
        }
    }

    // Carregar o formulário de edição do usuário.
    public function edit(User $user)
    {
        // Carregar a view
        return view('users.edit', ['user' => $user]);
    }

    // Editar o usuário no banco de dados.
    public function update(UserRequest $request, User $user)
    {
        try {
            // Editar as informações do registro no banco de dados.
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Usuário atualizado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao atualizar o usuário!');
        }
    }

    // Carregar o formulário de edição de senha do usuário.
    public function editPassword(User $user)
    {
        // Carregar a view
        return view('users.edit_password', ['user' => $user]);
    }

    // Editar a senha do usuário no banco de dados.
    public function updatePassword(Request $request, User $user)
    {
        // Validar o formulário.
        $request->validate(
            [
                'password' => 'required|min:6|',
            ],
            // Mensagens de erro para as regras de validação
            // Caso o usuário não preencha o campo senha, a mensagem de erro será "O campo senha é obrigatório!"
            // Caso o usuário não preencha o campo senha com menos de 6 caracteres, a mensagem de erro será "O campo senha deve ter no mínimo 6 caracteres!"
            [
                'password.required' => "O campo senha é obrigatório!",
                'password.min' => "O campo senha deve ter no mínimo :min caracteres!",
            ]
        );


        // Capturar possíveis exceções durante a execução do código.
        try {
            // Editar as informações do registro no banco de dados.
            $user->update([
                'password' => $request->password,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Senha atualizada com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao atualizar a senha!');
        }
    }

    // Deletar o usuário no banco de dados.
    public function destroy(User $user)
    {
        try {
            // Deletar o registro do banco de dados.
            $user->delete();

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao deletar o usuário!');
        }
    }
}
