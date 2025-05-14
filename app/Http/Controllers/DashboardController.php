<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    // Página inicial do administrativo
    public function index()
    {
        // Carregar a VIEW
        return view('dashboard.index');
    }
}
