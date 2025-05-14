<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use App\Models\Module;
use Exception;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
    // Listar as aulas
    public function index(Module $module)
    {
        // dd($module);
        // Recuperar os registros do banco dados
        $lessons = Lesson::orderBy('id', 'DESC')
            ->where('module_id', $module->id)
            ->paginate(10);

        // Salvar log
        Log::info('Listar as aulas.');

        // Carregar a view 
        return view('lessons.index', ['lessons' => $lessons, 'module' => $module]);
    }

    // Visualizar os detalhes da aula
    public function show(Lesson $lesson)
    {
        // Salvar log
        Log::info('Visualizar a aula.', ['lesson_id' => $lesson->id]);

        // Carregar a view 
        return view('lessons.show', ['lesson' => $lesson]);
    }

    // Carregar o formulário cadastrar nova aula
    public function create(Module $module)
    {
        // Carregar a view 
        return view('lessons.create', ['module' => $module]);
    }

    // Cadastrar no banco de dados o nova aula
    public function store(LessonRequest $request, Module $module)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Cadastrar no banco de dados na tabela aula
            $lesson = Lesson::create([
                'name' => $request->name,
                'module_id' => $module->id,
            ]);

            // Salvar log
            Log::info('Aula cadastrada.', ['lesson_id' => $lesson->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('lessons.show', ['lesson' => $lesson->id])->with('success', 'Aula cadastrada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Aula não cadastrada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Aula não cadastrada!');
        }
    }

    // Carregar o formulário editar aula
    public function edit(Lesson $lesson)
    {
        // Carregar a view 
        return view('lessons.edit', ['lesson' => $lesson]);
    }

    // Editar no banco de dados o aula
    public function update(LessonRequest $request, Lesson $lesson)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Editar as informações do registro no banco de dados
            $lesson->update([
                'name' => $request->name
            ]);

            // Salvar log
            Log::info('Aula editada.', ['lesson_id' => $lesson->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('lessons.show', ['lesson' => $lesson->id])->with('success', 'Aula editada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Aula não editada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Aula não editada!');
        }
    }

    // Excluir o curso do banco de dados
    public function destroy(Lesson $lesson)
    {
        // Capturar possíveis exceções durante a execução.
        try {

            // Excluir o registro do banco de dados
            $lesson->delete();

            // Salvar log
            Log::info('Aula apagada.', ['lesson_id' => $lesson->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('lessons.index')->with('success', 'Aula apagada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Aula não apagada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Aula não apagada!');
        }
    }
}
