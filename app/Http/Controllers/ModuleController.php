<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // Listar os módulos
    public function index()
    {
        // Carregar a view
        return view('modules.index');
    }

    //Carregar o formulário de cadastro dos módulos.
    public function create()
    {
        // Carregar a view
        return view('modules.create');
    }
}
