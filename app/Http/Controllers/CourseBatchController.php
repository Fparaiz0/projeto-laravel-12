<?php

namespace App\Http\Controllers;

use App\Models\CourseBatch;
use Illuminate\Http\Request;

class CourseBatchController extends Controller
{
    // Listar as turmas do curso
    public function index()
    {
        // Recuperar os registros do banco de dados
        $coursesBatches = CourseBatch::orderBy('id', 'DESC')->get();

        // Carregar a view
        return view('courses-batches.index', ['coursesBatches' => $coursesBatches]);
    }

    //Carregar o formulário de cadastro de turmas do curso.
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
