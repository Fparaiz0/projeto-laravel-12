<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStatusRequest;
use App\Models\CourseStatus;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseStatusController extends Controller
{
    // Listar os status dos cursos
    public function index()
    {
        // Recuperar os registros do banco de dados
        $coursesStatuses = CourseStatus::orderBy('id', 'DESC')->paginate(10);

        // Salvar log
        Log::info('Listar os status dos cursos.');

        // Carregar a view
        return view('course_statuses.index', ['coursesStatuses' => $coursesStatuses]);
    }

    // Visualizar os detalhes do status do curso.
    public function show(CourseStatus $courseStatus)
    {
        // Salvar log
        Log::info('Visualizar o status do curso.', ['course_status_id' => $courseStatus->id]);

        // Carregar a view
        return view('course_statuses.show', ['courseStatus' => $courseStatus]);
    }

    //Carregar o formulário de cadastro dos status do curso.
    public function create()
    {
        // Carregar a view
        return view('course_statuses.create');
    }

    // Cadastrar no banco de dados o status do curso.
    public function store(CourseStatusRequest $request)
    {
        try {
            // Cadastrar no banco de dados na tabela course_statuses.
            $courseStatus = CourseStatus::create([
                'name' => $request->name,
            ]);

            // Salvar log
            Log::info('Status do curso cadastrado.', ['course_status_id' => $courseStatus->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_statuses.show', ['courseStatus' => $courseStatus->id])->with('success', 'Status do curso cadastrado com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Status do curso não cadastrado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao cadastrar o status do curso!');
        }
    }

    // Carregar o formulário de edição do status do curso.
    public function edit(CourseStatus $courseStatus)
    {
        // Carregar a view
        return view('course_statuses.edit', ['courseStatus' => $courseStatus]);
    }

    // Editar o status do curso no banco de dados.
    public function update(CourseStatusRequest $request, CourseStatus $courseStatus)
    {
        try {
            // Editar as informações do registro no banco de dados.
            $courseStatus->update([
                'name' => $request->name,
            ]);

            // Salvar log
            Log::info('Status do curso editado.', ['course_status_id' => $courseStatus->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('course_statuses.show', ['courseStatus' => $courseStatus->id])->with('success', 'Status do curso atualizado com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Status do curso não editado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao atualizar o status do curso!');
        }
    }

    // Deletar o status do curso do banco de dados.
    public function destroy(CourseStatus $courseStatus)
    {
        try {
            // Deletar o registro do banco de dados.
            $courseStatus->delete();

            // Salvar log
            Log::info('Status do curso deletado.', ['course_status_id' => $courseStatus->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('course_statuses.index')->with('success', 'Status do curso deletado com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Status do curso não deletado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao deletar o status do curso!');
        }
    }
}
