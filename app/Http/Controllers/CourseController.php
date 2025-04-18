<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Listar os projetos 
    public function index()
    {
        // Carregar a view
        return view('courses.index');
    }

    //Carregar o formulário de cadastro do usúario.
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
