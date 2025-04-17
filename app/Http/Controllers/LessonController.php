<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    // Listar as aulas
    public function index()
    {
        // Carregar a view
        return view('lessons.index');
    }

    //Carregar o formulário de cadastro de aulas.
    public function create()
    {
        // Carregar a view
        return view('lessons.create');
    }
}
