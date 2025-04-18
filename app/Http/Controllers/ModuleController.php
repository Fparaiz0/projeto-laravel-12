<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // Listar os módulos
    public function index()
    {
        // Carregar a view
        return view('modules.index');
    }

    //Carregar o formulário de cadastro dos módulos.
    public function create()
    {
        // Carregar a view
        return view('modules.create');
    }

    // Cadastrar no banco de dados o novo módulo.
    public function store(Request $request)
    {
        // Cadastrar no banco de dados na tabela modules.
        Module::create([
            'name' => $request->name,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('modules.index')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
