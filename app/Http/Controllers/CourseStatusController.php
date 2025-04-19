<?php

namespace App\Http\Controllers;

use App\Models\CourseStatus;
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
        // Cadastrar no banco de dados na tabela course_statuses.
        CourseStatus::create([
            'name' => $request->name,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('course_statuses.index')->with('success', 'Status do curso cadastrado com sucesso!');
    }
}
