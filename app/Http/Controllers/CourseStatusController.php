<?php

namespace App\Http\Controllers;

use App\Models\CourseStatus;
use Exception;
use Illuminate\Http\Request;

class CourseStatusController extends Controller
{
    // Listar os status dos cursos
    public function index()
    {
        // Recuperar os registros do banco de dados
        $coursesStatuses = CourseStatus::orderBy('id', 'DESC')->get();

        // Carregar a view
        return view('course_statuses.index', ['coursesStatuses' => $coursesStatuses]);
    }

    // Visualizar os detalhes do status do curso.
    public function show(CourseStatus $courseStatus)
    {
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
    public function store(Request $request)
    {
        try {
            // Cadastrar no banco de dados na tabela course_statuses.
            CourseStatus::create([
                'name' => $request->name,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_statuses.index')->with('success', 'Status do curso cadastrado com sucesso!');
        } catch (Exception $e) {
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

    // Editar o status do usuário no banco de dados.
    public function update(Request $request, CourseStatus $courseStatus)
    {
        try {
            // Editar as informações do registro no banco de dados.
            $courseStatus->update([
                'name' => $request->name,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('course_statuses.show', ['courseStatus' => $courseStatus->id])->with('success', 'Status do usuário atualizado com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao atualizar o status do usuário!');
        }
    }
}
