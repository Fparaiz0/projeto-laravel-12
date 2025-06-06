<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStatusRequest;
use App\Models\UserStatus;
use Exception;
use Illuminate\Support\Facades\Log;

class UserStatusController extends Controller
{
    // Listar os status
    public function index()
    {
        // Recuperar os registros do banco de dados
        $userStatuses = UserStatus::orderBy('id', 'DESC')->paginate(10);

        // Salvar log
        Log::info('Listar os status do usuário.');

        // Carregar a view
        return view('user_statuses.index', ['userStatuses' => $userStatuses]);
    }

    // Visualizar os detalhes do status do usuário.
    public function show(UserStatus $userStatus)
    {
        // Salvar log
        Log::info('Visualizar o status do usuário.', ['user_status_id' => $userStatus->id]);

        // Carregar a view
        return view('user_statuses.show', ['userStatus' => $userStatus]);
    }

    //Carregar o formulário de cadastro dos status.
    public function create()
    {
        // Carregar a view
        return view('user_statuses.create');
    }

    // Cadastrar no banco de dados o novo status.
    public function store(UserStatusRequest $request)
    {
        try {
            // Cadastrar no banco de dados na tabela statuses.
            $userStatus = UserStatus::create([
                'name' => $request->name,
            ]);

            // Salvar log
            Log::info('Status do usuário cadastrado.', ['user_status_id' => $userStatus->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('user_statuses.show', ['userStatus' => $userStatus->id])->with('success', 'Status do usuário cadastrado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Status do usuário não cadastrado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao cadastrar o status do usuário!');
        }
    }

    // Carregar o formulário de edição do status do usuário.
    public function edit(UserStatus $userStatus)
    {
        // Carregar a view
        return view('user_statuses.edit', ['userStatus' => $userStatus]);
    }

    // Editar o status do usuário no banco de dados.
    public function update(UserStatusRequest $request, UserStatus $userStatus)
    {
        try {
            // Editar as informações do registro no banco de dados.
            $userStatus->update([
                'name' => $request->name,
            ]);

            // Salvar log
            Log::info('Status do usuário editado.', ['user_status_id' => $userStatus->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('user_statuses.show', ['userStatus' => $userStatus->id])->with('success', 'Status do usuário atualizado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Status do usuário não editado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao atualizar o status do usuário!');
        }
    }

    // Deletar o status do usuário no banco de dados.
    public function destroy(UserStatus $userStatus)
    {
        try {
            // Deletar o registro do banco de dados.
            $userStatus->delete();

            // Salvar log
            Log::info('Status do usuário deletado.', ['user_status_id' => $userStatus->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso.
            return redirect()->route('user_statuses.index')->with('success', 'Status do usuário deletado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::notice('Status do usuário não deletado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro.
            return back()->withInput()->with('error', 'Erro ao deletar o status do usuário!');
        }
    }
}
