<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    // Listar os cursos 
    public function index()
    {
        // Recuperar os registros do banco de dados
        $courses = Course::orderBy('id', 'DESC')->paginate(10);

        // Salvar log
        Log::info('Listar os cursos.');

        // Carregar a view
        return view('courses.index', ['courses' => $courses]);
    }

    // Visualizar os detalhes do curso.
    public function show(Course $course)
    {
        // Salvar log
        Log::info('Visualizar o curso.', ['course_id' => $course->id]);

        // Carregar a view
        return view('courses.show', ['course' => $course]);
    }

    // Carregar o formulário de cadastro novo curso.
    public function create()
    {
        // Carregar a view
        return view('courses.create');
    }

    //Cadastrar no banco de dados o novo curso.
    public function store(CourseRequest $request)
    {
        try {
            //Cadastrar no banco de dados na tabela cursos.
            $course = Course::create([
                'name' => $request->name
            ]);

            // Salvar log
            Log::info('Curso cadastrado.', ['course_id' => $course->id]);

            //Redicionar o usuário, enviar a mensagem de sucesso. 
            return redirect()->route('courses.show', ['course' => $course->id])->with('success', 'Curso cadastrado com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Curso não cadastrado.', ['error' => $e->getMessage()]);

            //Redicionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao cadastrar o curso!');
        }
    }

    // Carregar o formulário de edição do curso.
    public function edit(Course $course)
    {
        // Carregar a view
        return view('courses.edit', ['course' => $course]);
    }

    // Editar o curso no banco de dados.
    public function update(CourseRequest $request, Course $course)
    {
        try {
            // Editar as informações do registro no banco de dados.
            $course->update([
                'name' => $request->name
            ]);

            // Salvar log
            Log::info('Curso atualizado.', ['course_id' => $course->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('courses.show', ['course' => $course->id])->with('success', 'Curso atualizado com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Curso não atualizado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao atualizar o curso!');
        }
    }

    // Deletar o curso no banco de dados.
    public function destroy(Course $course)
    {
        try {
            // Deletar o registro do banco de dados.
            $course->delete();

            // Salvar log
            Log::info('Curso deletado.', ['course_id' => $course->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('courses.index')->with('success', 'Curso deletado com sucesso!');
        } catch (Exception $e) {
            // Salvar log
            Log::notice('Curso não deletado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->with('error', 'Erro ao deletar o curso!');
        }
    }
}
