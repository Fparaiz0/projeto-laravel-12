<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Listar os cursos 
    public function index()
    {
        // Recuperar os registros do banco de dados
        $courses = Course::orderBy('id', 'DESC')->get();

        // Carregar a view
        return view('courses.index', ['courses' => $courses]);
    }

    //Carregar o formulário de cadastro novo curso.
    public function create()
    {
        // Carregar a view
        return view('courses.create');
    }

    //Cadastrar no banco de dados o novo curso.
    public function store(Request $request)
    {
        //Cadastrar no banco de dados na tabela cursos.
        Course::create([
            'name' => $request->name
        ]);

        //Redicionar o usuário, enviar a mensagem de sucesso. 
        return redirect()->route('courses.index')->with('success', 'Curso cadastrado com sucesso!');
    }
}
