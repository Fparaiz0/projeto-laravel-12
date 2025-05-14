<?php

use App\Http\Controllers\CourseBatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStatusController;
use Illuminate\Support\Facades\Route;

// Tela home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Tela de login 
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Usuários
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/{user}/edit-password', [UserController::class, 'editPassword'])->name('users.edit_password');
    Route::put('/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.update_password');
});

// Usuários Status
Route::prefix('user-statuses')->group(function () {
    Route::get('/', [UserStatusController::class, 'index'])->name('user_statuses.index');
    Route::get('/create', [UserStatusController::class, 'create'])->name('user_statuses.create');
    Route::get('/{userStatus}', [UserStatusController::class, 'show'])->name('user_statuses.show');
    Route::post('/', [UserStatusController::class, 'store'])->name('user_statuses.store');
    Route::get('/{userStatus}/edit', [UserStatusController::class, 'edit'])->name('user_statuses.edit');
    Route::put('/{userStatus}', [UserStatusController::class, 'update'])->name('user_statuses.update');
    Route::delete('/{userStatus}', [UserStatusController::class, 'destroy'])->name('user_statuses.destroy');
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
    Route::get('/{courseStatus}/edit', [CourseStatusController::class, 'edit'])->name('course_statuses.edit');
    Route::put('/{courseStatus}', [CourseStatusController::class, 'update'])->name('course_statuses.update');
    Route::delete('/{courseStatus}', [CourseStatusController::class, 'destroy'])->name('course_statuses.destroy');
});

// Turmas
Route::prefix('course-batches')->group(function () {
    Route::get('/courses/{course}', [CourseBatchController::class, 'index'])->name('course_batches.index');
    Route::get('/create/{course}', [CourseBatchController::class, 'create'])->name('course_batches.create');
    Route::get('/{courseBatch}', [CourseBatchController::class, 'show'])->name('course_batches.show');
    Route::post('/{course}', [CourseBatchController::class, 'store'])->name('course_batches.store');
    Route::get('/{courseBatch}/edit', [CourseBatchController::class, 'edit'])->name('course_batches.edit');
    Route::put('/{courseBatch}', [CourseBatchController::class, 'update'])->name('course_batches.update');
    Route::delete('/{courseBatch}', [CourseBatchController::class, 'destroy'])->name('course_batches.destroy');
});

// Módulos
Route::prefix('modules')->group(function () {
    Route::get('/course-batch/{courseBatch}', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/create/{courseBatch}', [ModuleController::class, 'create'])->name('modules.create');
    Route::get('/{module}', [ModuleController::class, 'show'])->name('modules.show');
    Route::post('/create/{courseBatch}', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::put('/{module}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
});

// Aulas
Route::prefix('lessons')->group(function () {
    Route::get('/module/{module}', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/create/{module}', [LessonController::class, 'create'])->name('lessons.create');
    Route::get('/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
    Route::post('/{module}', [LessonController::class, 'store'])->name('lessons.store');
    Route::get('/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
    Route::put('/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
    Route::delete('/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');
});
