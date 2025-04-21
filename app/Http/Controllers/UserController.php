<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
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
    public function update(Request $request, User $user)
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
