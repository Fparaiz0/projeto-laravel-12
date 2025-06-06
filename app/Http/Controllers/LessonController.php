<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use Exception;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
    // Listar as aulas
    public function index()
    {
        // Recuperar os registros do banco de dados
        $lessons = Lesson::orderBy('id', 'DESC')->paginate(10);

        // Salvar log  
        Log::info('Listar as aulas.');

        // Carregar a view
        return view('lessons.index', ['lessons' => $lessons]);
    }

    // Visualizar os detalhes da aula.
    public function show(Lesson $lesson)
    {
        // Salvar log
        Log::info('Visualizar a aula.', ['lesson_id' => $lesson->id]);

        // Carregar a view
        return view('lessons.show', ['lesson' => $lesson]);
    }

    //Carregar o formulário de cadastro de aulas.
    public function create()
    {
        // Carregar a view
        return view('lessons.create');
    }

    // Cadastrar no banco de dados a nova aula.
    public function store(LessonRequest $request)
    {
        try {
            // Cadastrar no banco de dados na tabela lessons.
            $lesson = Lesson::create([
                'name' => $request->name,
            ]);

            // Salvar log
            Log::info('Aula cadastrada.', ['lesson_id' => $lesson->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('lessons.show', ['lesson' => $lesson->id])->with('success', 'Aula cadastrada com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Aula não cadastrada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Erro ao cadastrar a aula!');
        }
    }

    // Carregar o formulário de edição das aulas.
    public function edit(Lesson $lesson)
    {
        // Carregar a view
        return view('lessons.edit', ['lesson' => $lesson]);
    }

    // Editar a aula no banco de dados.
    public function update(LessonRequest $request, Lesson $lesson)
    {
        try {
            // Editar as informações do registro no banco de dados.
            $lesson->update([
                'name' => $request->name,
            ]);

            // Salvar log
            Log::info('Aula editada.', ['lesson_id' => $lesson->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('lessons.show', ['lesson' => $lesson->id])->with('success', 'Aula atualizada com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Aula não editada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao atualizar a aula!');
        }
    }

    // Deletar a aula do banco de dados.
    public function destroy(Lesson $lesson)
    {
        try {
            // Deletar o registro do banco de dados.
            $lesson->delete();

            // Salvar log
            Log::info('Aula deletada.', ['lesson_id' => $lesson->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('lessons.index')->with('success', 'Aula deletada com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Aula não deletada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao deletar a aula!');
        }
    }
}
