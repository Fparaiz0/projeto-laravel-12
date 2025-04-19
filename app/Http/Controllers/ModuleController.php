<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // Listar os módulos
    public function index()
    {
        // Recuperar os registros do banco de dados
        $modules = Module::orderBy('id', 'DESC')->get();

        // Carregar a view
        return view('modules.index', ['modules' => $modules]);
    }

    // Visualizar os detalhes do módulo.
    public function show(Module $module)
    {
        // Carregar a view
        return view('modules.show', ['module' => $module]);
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
