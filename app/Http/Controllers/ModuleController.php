<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use Exception;
use Illuminate\Support\Facades\Log;

class ModuleController extends Controller
{
    // Listar os módulos
    public function index()
    {
        // Recuperar os registros do banco de dados
        $modules = Module::orderBy('id', 'DESC')->paginate(10);

        // Salvar log
        Log::info('Listar os módulos.');

        // Carregar a view
        return view('modules.index', ['modules' => $modules]);
    }

    // Visualizar os detalhes do módulo.
    public function show(Module $module)
    {
        // Salvar log
        Log::info('Visualizar o módulo.', ['module_id' => $module->id]);

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
            $module = Module::create([
                'name' => $request->name,
            ]);

            // Salvar log
            log::info('Módulo cadastrado.', ['module_id' => $module->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('modules.show', ['module' => $module->id])->with('success', 'Módulo cadastrado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Módulo não cadastrado.', ['error' => $e->getMessage()]);

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

            // Salvar log
            Log::info('Módulo atualizado.', ['module_id' => $module->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('modules.show', ['module' => $module->id])->with('success', 'Módulo atualizado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Módulo não atualizado.', ['error' => $e->getMessage()]);

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

            // Salvar log
            Log::info('Módulo deletado.', ['module_id' => $module->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('modules.index')->with('success', 'Módulo deletado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Módulo não deletado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao deletar o módulo!');
        }
    }
}
