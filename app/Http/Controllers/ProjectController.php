<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Listar os projetos 
    public function index()
    {
        // Carregar a view
        return view('project.index');
    }
}
