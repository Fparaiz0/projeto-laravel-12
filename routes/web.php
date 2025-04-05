<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Projetos 
Route::get('/index-project', [ProjectController::class, 'index'])->name('project.index');
