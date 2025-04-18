<?php

namespace App\Http\Controllers;

use App\Models\CourseBatch;
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

    // Cadastrar no banco de dados o status do curso.
    public function store(Request $request)
    {
        // Cadastrar no banco de dados na tabela course_statuses.
        CourseBatch::create([
            'name' => $request->name,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('courses-batches.index')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
