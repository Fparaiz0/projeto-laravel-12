<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use Exception;

class ModuleController extends Controller
{
    // Listar os módulos
    public function index()
    {
        // Recuperar os registros do banco de dados
        $modules = Module::orderBy('id', 'DESC')->paginate(10);

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
    public function store(ModuleRequest $request)
    {
        try {
            // Cadastrar no banco de dados na tabela modules.
            Module::create([
                'name' => $request->name,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('modules.index')->with('success', 'Módulo cadastrado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Erro ao cadastrar o módulo!');
        }
    }

    // Carregar o formulário de edição do módulo.
    public function edit(Module $module)
    {
        // Carregar a view
        return view('modules.edit', ['module' => $module]);
    }

    // Editar o módulo no banco de dados.
    public function update(ModuleRequest $request, Module $module)
    {
        try {
            // Editar as informações do registro no banco de dados.
            $module->update([
                'name' => $request->name,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('modules.show', ['module' => $module->id])->with('success', 'Módulo atualizado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao atualizar o módulo!');
        }
    }

    // Deletar o módulo do banco de dados.
    public function destroy(Module $module)
    {
        try {
            // Deletar o registro do banco de dados.
            $module->delete();

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('modules.index')->with('success', 'Módulo deletado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao deletar o módulo!');
        }
    }
}
