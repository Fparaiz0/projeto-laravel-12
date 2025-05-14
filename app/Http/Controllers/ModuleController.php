<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Models\CourseBatch;
use App\Models\Module;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ModuleController extends Controller
{
    // Listar os módulos das turmas
    public function index(CourseBatch $courseBatch)
    {
        // Recuperar os registros do banco dados
        $modules = Module::orderBy('id', 'DESC')
            ->where('course_batch_id', $courseBatch->id)
            ->paginate(10);

        // Salvar log
        Log::info('Listar os módulos.', ['action_user_id' => Auth::id()]);

        // Carregar a view 
        return view('modules.index', ['modules' => $modules, 'courseBatch' => $courseBatch]);
    }

    // Visualizar os detalhes do módulo
    public function show(Module $module)
    {
        // Salvar log
        Log::info('Visualizar o módulo.', ['module_id' => $module->id, 'action_user_id' => Auth::id()]);

        // Carregar a view 
        return view('modules.show', ['module' => $module]);
    }

    // Carregar o formulário cadastrar novo módulo
    public function create(CourseBatch $courseBatch)
    {
        // Carregar a view 
        return view('modules.create', ['courseBatch' => $courseBatch]);
    }

    // Cadastrar no banco de dados o novo módulo
    public function store(CourseBatch $courseBatch, ModuleRequest $request)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Cadastrar no banco de dados na tabela módulo
            $module = Module::create([
                'name' => $request->name,
                'course_batch_id' => $courseBatch->id,
            ]);

            // Salvar log
            Log::info('Módulo cadastrado.', ['module_id' => $module->id, 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('modules.show', ['module' => $module->id])->with('success', 'Módulo cadastrado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Módulo não cadastrado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Módulo não cadastrado!');
        }
    }

    // Carregar o formulário editar módulo
    public function edit(Module $module)
    {
        // Carregar a view 
        return view('modules.edit', ['module' => $module]);
    }

    // Editar no banco de dados o módulo
    public function update(ModuleRequest $request, Module $module)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Editar as informações do registro no banco de dados
            $module->update([
                'name' => $request->name
            ]);

            // Salvar log
            Log::info('Módulo editado.', ['module_id' => $module->id, 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('modules.show', ['module' => $module->id])->with('success', 'Módulo editado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Módulo não editado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Módulo não editado!');
        }
    }

    // Excluir o curso do banco de dados
    public function destroy(Module $module)
    {
        // Capturar possíveis exceções durante a execução.
        try {

            // Excluir o registro do banco de dados
            $module->delete();

            // Salvar log
            Log::info('Módulo apagado.', ['module_id' => $module->id, 'action_user_id' => Auth::id()]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('modules.index')->with('success', 'Módulo apagado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Módulo não apagado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Módulo não apagado!');
        }
    }
}
