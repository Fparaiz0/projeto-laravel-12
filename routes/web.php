<?php

use App\Http\Controllers\CourseBatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStatusController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cursos 
Route::get('/index-course', [CourseController::class, 'index'])->name('courses.index');
Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/create-course', [CourseController::class, 'create'])->name('courses.create');
Route::post('/store-course', [CourseController::class, 'store'])->name('courses.store');

// Cursos Status
Route::get('/index-course-status', [CourseStatusController::class, 'index'])->name('courses-status.index');
Route::get('/create-course-status', [CourseStatusController::class, 'create'])->name('courses-status.create');
Route::post('/store-course-status', [CourseStatusController::class, 'store'])->name('courses-status.store');

// Turmas
Route::get('/index-course-batches', [CourseBatchController::class, 'index'])->name('courses-batches.index');
Route::get('/create-course-batches', [CourseBatchController::class, 'create'])->name('courses-batches.create');
Route::post('/store-course-batches', [CourseBatchController::class, 'store'])->name('courses-batches.store');

// Modulos
Route::get('/index-modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/create-modules', [ModuleController::class, 'create'])->name('modules.create');
Route::post('/store-modules', [ModuleController::class, 'store'])->name('modules.store');

// Aulas
Route::get('/index-lessons', [LessonController::class, 'index'])->name('lessons.index');
Route::get('/create-lessons', [LessonController::class, 'create'])->name('lessons.create');
Route::post('/store-lessons', [LessonController::class, 'store'])->name('lessons.store');

// Usuários
Route::get('/index-users', [UserController::class, 'index'])->name('users.index');
Route::get('/create-users', [UserController::class, 'create'])->name('users.create');
Route::post('/store-users', [UserController::class, 'store'])->name('users.store');

// Usuários Status
Route::get('/index-status', [StatusController::class, 'index'])->name('status.index');
Route::get('/create-status', [StatusController::class, 'create'])->name('status.create');
Route::post('/store-status', [StatusController::class, 'store'])->name('status.store');
