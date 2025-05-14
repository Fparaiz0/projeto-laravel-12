<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseBatchRequest;
use App\Models\Course;
use App\Models\CourseBatch;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseBatchController extends Controller
{
    // Listar as turmas dos cursos
    public function index(Course $course)
    {
        // Recuperar os registros do banco dados
        $coursesBatches = CourseBatch::orderBy('id', 'DESC')
            ->where('course_id', $course->id)
            ->paginate(10);

        // Salvar log
        Log::info('Listar as turmas.');

        // Carregar a view 
        return view('course_batches.index', ['coursesBatches' => $coursesBatches, 'course' => $course]);
    }

    // Visualizar os detalhes da turma
    public function show(CourseBatch $courseBatch)
    {
        // Salvar log
        Log::info('Visualizar a turma.', ['course_batch_id' => $courseBatch->id]);

        // Carregar a view 
        return view('course_batches.show', ['courseBatch' => $courseBatch]);
    }

    // Carregar o formulário cadastrar nova turma
    public function create(Course $course)
    {
        // Carregar a view 
        return view('course_batches.create', ['course' => $course]);
    }

    // Cadastrar no banco de dados o nova turma
    public function store(Course $course, CourseBatchRequest $request)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Cadastrar no banco de dados na tabela turmas
            $courseBatch = CourseBatch::create([
                'name' => $request->name,
                'course_id' => $course->id,
            ]);

            // Salvar log
            Log::info('Turma cadastrada.', ['course_batch_id' => $courseBatch->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.show', ['courseBatch' => $courseBatch->id])->with('success', 'Turma cadastrada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Turma não cadastrada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Turma não cadastrada!');
        }
    }

    // Carregar o formulário editar turma
    public function edit(CourseBatch $courseBatch)
    {
        // Carregar a view 
        return view('course_batches.edit', ['courseBatch' => $courseBatch]);
    }

    // Editar no banco de dados o turma
    public function update(CourseBatch $courseBatch, CourseBatchRequest $request)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Editar as informações do registro no banco de dados
            $courseBatch->update([
                'name' => $request->name
            ]);

            // Salvar log
            Log::info('Turma editada.', ['course_batch_id' => $courseBatch->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.show', ['courseBatch' => $courseBatch->id])->with('success', 'Turma editada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Turma não editada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Turma não editada!');
        }
    }

    // Excluir o curso do banco de dados
    public function destroy(CourseBatch $courseBatch)
    {
        // Capturar possíveis exceções durante a execução.
        try {

            // Excluir o registro do banco de dados
            $courseBatch->delete();

            // Salvar log
            Log::info('Turma apagada.', ['course_batch_id' => $courseBatch->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.index', ['course' => $courseBatch->course_id])->with('success', 'Turma apagada com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Turma não apagada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Turma não apagado!');
        }
    }
}
