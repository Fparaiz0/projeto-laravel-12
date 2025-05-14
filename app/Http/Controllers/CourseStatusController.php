<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStatusRequest;
use App\Models\CourseStatus;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseStatusController extends Controller
{
    // Listar os status cursos
    public function index()
    {
        // Recuperar os registros do banco dados
        $coursesStatuses = CourseStatus::orderBy('id', 'DESC')->paginate(10);

        // Salvar log
        Log::info('Listar os status para curso.');

        // Carregar a view 
        return view('course_statuses.index', ['coursesStatuses' => $coursesStatuses]);
    }

    // Visualizar os detalhes do status para curso
    public function show(CourseStatus $courseStatus)
    {
        // Salvar log
        Log::info('Visualizar o status para curso.', ['course_status_id' => $courseStatus->id]);

        // Carregar a view 
        return view('course_statuses.show', ['courseStatus' => $courseStatus]);
    }

    // Carregar o formulário cadastrar novo status curso
    public function create()
    {
        // Carregar a view 
        return view('course_statuses.create');
    }

    // Cadastrar no banco de dados o novo status curso
    public function store(CourseStatusRequest $request)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Cadastrar no banco de dados na tabela status cursos
            $courseStatus = CourseStatus::create([
                'name' => $request->name
            ]);

            // Salvar log
            Log::info('Status para curso cadastrado.', ['course_status_id' => $courseStatus->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_statuses.show', ['courseStatus' => $courseStatus->id])->with('success', 'Status para curso cadastrado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Status para curso não cadastrado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Status para curso não cadastrado!');
        }
    }

    // Carregar o formulário editar status para curso
    public function edit(CourseStatus $courseStatus)
    {
        // Carregar a view 
        return view('course_statuses.edit', ['courseStatus' => $courseStatus]);
    }

    // Editar no banco de dados status para curso
    public function update(CourseStatusRequest $request, CourseStatus $courseStatus)
    {
        // Capturar possíveis exceções durante a execução.
        try {
            // Editar as informações do registro no banco de dados
            $courseStatus->update([
                'name' => $request->name
            ]);

            // Salvar log
            Log::info('Status para curso editado.', ['course_status_id' => $courseStatus->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_statuses.show', ['courseStatus' => $courseStatus->id])->with('success', 'Status para curso editado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Status para curso não editado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Status para curso não editado!');
        }
    }

    // Excluir o curso do banco de dados
    public function destroy(CourseStatus $courseStatus)
    {
        // Capturar possíveis exceções durante a execução.
        try {

            // Excluir o registro do banco de dados
            $courseStatus->delete();

            // Salvar log
            Log::info('Status para curso apagado.', ['course_status_id' => $courseStatus->id]);
            
            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('course_statuses.index')->with('success', 'Status para curso apagado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Status para curso não apagado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Status para curso não apagado!');
        }
    }
}
