<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseBatchRequest;
use App\Models\CourseBatch;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseBatchController extends Controller
{
    // Listar as turmas do curso
    public function index()
    {
        // Recuperar os registros do banco de dados
        $coursesBatches = CourseBatch::orderBy('id', 'DESC')->paginate(10);

        // Salvar log
        Log::info('Listar as turmas do curso.');

        // Carregar a view
        return view('course_batches.index', ['coursesBatches' => $coursesBatches]);
    }

    // Visualizar os detalhes das turmas.
    public function show(CourseBatch $courseBatch)
    {
        // Salvar log
        Log::info('Visualizar a turma do curso.', ['course_batch_id' => $courseBatch->id]);

        // Carregar a view
        return view('course_batches.show', ['courseBatch' => $courseBatch]);
    }

    //Carregar o formulário de cadastro de turmas do curso.
    public function create()
    {
        // Carregar a view
        return view('course_batches.create');
    }

    // Cadastrar no banco de dados turmas do curso.
    public function store(CourseBatchRequest $request)
    {
        try {
            // Cadastrar no banco de dados na tabela course_batches.
            $courseBatch = CourseBatch::create([
                'name' => $request->name,
            ]);

            // Salvar log
            Log::info('Turma cadastrada.', ['course_batch_id' => $courseBatch->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.show', ['courseBatch' => $courseBatch->id])->with('success', 'Turma cadastrada com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Turma não cadastrada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao cadastrar a turma!');
        }
    }

    // Carregar o formulário de edição da turma.
    public function edit(CourseBatch $courseBatch)
    {
        // Carregar a view
        return view('course_batches.edit', ['courseBatch' => $courseBatch]);
    }

    // Editar a turma no banco de dados.
    public function update(CourseBatchRequest $request, CourseBatch $courseBatch)
    {
        try {
            // Editar as informações do registro no banco de dados.
            $courseBatch->update([
                'name' => $request->name,
            ]);

            // Salvar log
            Log::info('Turma editada.', ['course_batch_id' => $courseBatch->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('course_batches.show', ['courseBatch' => $courseBatch->id])->with('success', 'Turma atualizada com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Turma não editada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao atualizar a turma!');
        }
    }
    // Deletar a turma do banco de dados.
    public function destroy(CourseBatch $courseBatch)
    {
        try {
            // Deletar o registro do banco de dados.
            $courseBatch->delete();

            // Salvar log
            Log::info('Turma deletada.', ['course_batch_id' => $courseBatch->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('course_batches.index')->with('success', 'Turma deletada com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Turma não deletada.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao deletar a turma!');
        }
    }
}
