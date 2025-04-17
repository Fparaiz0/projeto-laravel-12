<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Listar os usuários
    public function index()
    {
        // Carregar a view
        return view('users.index');
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
        // Cadastrar no banco de dados na tabela usuários 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
