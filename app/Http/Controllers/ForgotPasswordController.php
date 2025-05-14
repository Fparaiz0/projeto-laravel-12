<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    // Formulário para receber o link recuperar senha 
    public function showLinkRequestForm()
    {
        // Carregar a VIEW
        return view('auth.forgot_password');
    }
}
