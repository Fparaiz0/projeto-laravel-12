<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //Login 
    public function index()
    {
        return view('auth.login');
    }

    // Validar os dados do usuário no login 
    public function loginProcess(LoginRequest $request)
    {
        // Capturar possiveis exceções durante a execução 
        try {
            // Validar o usuário e a senha com as informações do banco de dados
            $authenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

            // Verificar se o usuário foi autenticado com sucesso
            if (!$authenticated) {
                // Salvar log 
                Log::notice('E-mail ou a senha inválido!', ['email' => $request->email]);

                // Redirecionar o usuário, enviar a mensagem de erro
                return back()->withInput()->with('error', 'E-mail ou a senha inválido!');
            }

            // Redicionar o usuário
            return redirect()->route('dashboard.index');
        } catch (Exception $e) {
            // Salvar log 
            Log::notice('Dados do login incorreto.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'E-mail ou a senha inválido!');
        }
    }
}
