<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cursos 
Route::get('/index-course', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/create-course', [CoursesController::class, 'create'])->name('courses.create');
Route::post('/store-course', [CoursesController::class, 'store'])->name('courses.store');
