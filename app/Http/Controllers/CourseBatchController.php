<?php

namespace App\Http\Controllers;

use App\Models\CourseBatch;
use Exception;
use Illuminate\Http\Request;

class CourseBatchController extends Controller
{
    // Listar as turmas do curso
    public function index()
    {
        // Recuperar os registros do banco de dados
        $coursesBatches = CourseBatch::orderBy('id', 'DESC')->get();

        // Carregar a view
        return view('course_batches.index', ['coursesBatches' => $coursesBatches]);
    }

    // Visualizar os detalhes das turmas.
    public function show(CourseBatch $courseBatch)
    {
        // Carregar a view
        return view('course_batches.show', ['courseBatch' => $courseBatch]);
    }

    //Carregar o formulário de cadastro de turmas do curso.
    public function create()
    {
        // Carregar a view
        return view('course_batches.create');
    }

    // Cadastrar no banco de dados turmas do curso.
    public function store(Request $request)
    {
        try {
            // Cadastrar no banco de dados na tabela course_batches.
            CourseBatch::create([
                'name' => $request->name,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_batches.index')->with('success', 'Turma cadastrada com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao cadastrar a turma!');
        }
    }

    // Carregar o formulário de edição da turma.
    public function edit(CourseBatch $courseBatch)
    {
        // Carregar a view
        return view('course_batches.edit', ['courseBatch' => $courseBatch]);
    }

    // Editar o status do usuário no banco de dados.
    public function update(Request $request, CourseBatch $courseBatch)
    {
        try {
            // Editar as informações do registro no banco de dados.
            $courseBatch->update([
                'name' => $request->name,
            ]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('course_batches.show', ['courseBatch' => $courseBatch->id])->with('success', 'Turma atualizada com sucesso!');
        } catch (Exception $e) {
            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao atualizar a turma!');
        }
    }
}
