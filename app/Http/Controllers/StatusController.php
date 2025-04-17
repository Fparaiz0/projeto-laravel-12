<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    // Listar os status
    public function index()
    {
        // Carregar a view
        return view('status.index');
    }

    //Carregar o formulário de cadastro dos status.
    public function create()
    {
        // Carregar a view
        return view('status.create');
    }

    // Cadastrar no banco de dados o novo status.
    public function store(Request $request)
    {
        // Cadastrar no banco de dados na tabela statuses.
        Status::create([
            'name' => $request->name,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('status.index')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
