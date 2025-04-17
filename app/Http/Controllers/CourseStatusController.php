<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseStatusController extends Controller
{
    // Listar os status dos cursos
    public function index()
    {
        // Carregar a view
        return view('courses-status.index');
    }

    //Carregar o formulário de cadastro dos status do curso.
    public function create()
    {
        // Carregar a view
        return view('courses-status.create');
    }
}
