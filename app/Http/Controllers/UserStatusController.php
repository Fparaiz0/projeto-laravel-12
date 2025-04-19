<?php

namespace App\Http\Controllers;

use App\Models\UserStatus;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{
    // Listar os status
    public function index()
    {
        // Recuperar os registros do banco de dados
        $userStatuses = UserStatus::orderBy('id', 'DESC')->get();

        // Carregar a view
        return view('user-status.index', ['userStatuses' => $userStatuses]);
    }

    // Visualizar os detalhes do status do usuário.
    public function show(UserStatus $userStatus)
    {
        // Carregar a view
        return view('user-status.show', ['userStatus' => $userStatus]);
    }

    //Carregar o formulário de cadastro dos status.
    public function create()
    {
        // Carregar a view
        return view('user-status.create');
    }

    // Cadastrar no banco de dados o novo status.
    public function store(Request $request)
    {
        // Cadastrar no banco de dados na tabela statuses.
        UserStatus::create([
            'name' => $request->name,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('user-status.index')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
