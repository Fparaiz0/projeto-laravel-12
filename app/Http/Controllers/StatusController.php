<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    // Listar os status
    public function index()
    {
        // Carregar a view
        return view('status.index');
    }

    //Carregar o formulário de cadastro dos status.
    public function create()
    {
        // Carregar a view
        return view('status.create');
    }
}
