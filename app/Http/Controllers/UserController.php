<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Listar os usuários
    public function index()
    {
        // Carregar a view
        return view('users.index');
    }

    //Carregar o formulário de cadastro de usuários.
    public function create()
    {
        // Carregar a view
        return view('users.create');
    }
}
