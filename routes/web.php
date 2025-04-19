<?php

use App\Http\Controllers\CourseBatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStatusController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Usuários
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
});
// Usuários Status  
Route::prefix('user-statuses')->group(function () {
    Route::get('/', [UserStatusController::class, 'index'])->name('user_statuses.index');
    Route::get('/create', [UserStatusController::class, 'create'])->name('user_statuses.create');
    Route::get('/{userStatus}', [UserStatusController::class, 'show'])->name('user_statuses.show');
    Route::post('/', [UserStatusController::class, 'store'])->name('user_statuses.store');
});

// Cursos 
Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/create', [CourseController::class, 'create'])->name('courses.create');
    Route::get('/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
});
// Cursos Status
Route::prefix('course-statuses')->group(function () {
    Route::get('/', [CourseStatusController::class, 'index'])->name('course_statuses.index');
    Route::get('/create', [CourseStatusController::class, 'create'])->name('course_statuses.create');
    Route::get('/{courseStatus}', [CourseStatusController::class, 'show'])->name('course_statuses.show');
    Route::post('/', [CourseStatusController::class, 'store'])->name('course_statuses.store');
});
// Turmas
Route::prefix('course-batches')->group(function () {
    Route::get('/', [CourseBatchController::class, 'index'])->name('course_batches.index');
    Route::get('/create', [CourseBatchController::class, 'create'])->name('course_batches.create');
    Route::get('/{courseBatch}', [CourseBatchController::class, 'show'])->name('course_batches.show');
    Route::post('/', [CourseBatchController::class, 'store'])->name('course_batches.store');
});
// Modulos
Route::prefix('modules')->group(function () {
    Route::get('/', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::get('/{module}', [ModuleController::class, 'show'])->name('modules.show');
    Route::post('/', [ModuleController::class, 'store'])->name('modules.store');
});
// Aulas
Route::prefix('lessons')->group(function () {
    Route::get('/', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/create', [LessonController::class, 'create'])->name('lessons.create');
    Route::get('/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
    Route::post('/', [LessonController::class, 'store'])->name('lessons.store');
});
