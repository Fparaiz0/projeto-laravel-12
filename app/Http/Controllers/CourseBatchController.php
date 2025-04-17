<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseBatchController extends Controller
{
    // Listar os lotes do curso
    public function index()
    {
        // Carregar a view
        return view('courses-batches.index');
    }

    //Carregar o formulário de cadastro de lotes do curso.
    public function create()
    {
        // Carregar a view
        return view('courses-batches.create');
    }
}
