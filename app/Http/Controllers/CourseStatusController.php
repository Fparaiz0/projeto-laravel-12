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
        return view('courses-status.index', ['coursesStatuses' => $coursesStatuses]);
    }

    // Visualizar os detalhes do curso.
    public function show(CourseStatus $courseStatus)
    {
        // Carregar a view
        return view('courses-status.show', ['courseStatus' => $courseStatus]);
    }

    //Carregar o formulário de cadastro dos status do curso.
    public function create()
    {
        // Carregar a view
        return view('courses-status.create');
    }

    // Cadastrar no banco de dados o status do curso.
    public function store(Request $request)
    {
        // Cadastrar no banco de dados na tabela course_statuses.
        CourseStatus::create([
            'name' => $request->name,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('courses-status.index')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
