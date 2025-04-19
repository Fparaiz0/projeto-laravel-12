<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    // Listar as aulas
    public function index()
    {
        // Recuperar os registros do banco de dados
        $lessons = Lesson::orderBy('id', 'DESC')->get();

        // Carregar a view
        return view('lessons.index', ['lessons' => $lessons]);
    }

    // Visualizar os detalhes da aula.
    public function show(Lesson $lesson)
    {
        // Carregar a view
        return view('lessons.show', ['lesson' => $lesson]);
    }

    //Carregar o formulário de cadastro de aulas.
    public function create()
    {
        // Carregar a view
        return view('lessons.create');
    }

    // Cadastrar no banco de dados a nova aula.
    public function store(Request $request)
    {
        // Cadastrar no banco de dados na tabela lessons.
        Lesson::create([
            'name' => $request->name,
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('lessons.index')->with('success', 'Aula cadastrada com sucesso!');
    }
}
