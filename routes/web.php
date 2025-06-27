<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseBatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStatusController;
use Illuminate\Support\Facades\Route;

// Página inicial do site 
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tela de login 
Route::get('/login', [AuthController::class, 'index'])->name('login');

// Processar os dados do login
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Formulário cadastrar novo usuário 
Route::get('/register', [AuthController::class, 'create'])->name('register');

// Receber os dados do formulário e cadastrar novo usuário
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

// Solicitar link para resetar a senha  
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Formulário para redefinir a senha com o token 
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showRequestForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

// Grupo de rotas restritas
Route::group(['middleware' => 'auth'], function () {

    // Página inicial do Administrativo
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('permission:dashboard');;

    // Página de Perfil
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show')->middleware('permission:show-profile');;
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('permission:edit-profile');;
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update')->middleware('permission:edit-profile');;
        Route::get('/edit-password', [ProfileController::class, 'editPassword'])->name('profile.edit_password')->middleware('permission:edit-password-profile');;
        Route::put('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update_password')->middleware('permission:edit-password-profile');;
    });

    // Usuários
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index')->middleware('permission:index-user');;
        Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('permission:create-user');;
        Route::get('/{user}', [UserController::class, 'show'])->name('users.show')->middleware('permission:show-user');;
        Route::post('/', [UserController::class, 'store'])->name('users.store')->middleware('permission:create-user');;
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('permission:edit-user');;
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update')->middleware('permission:edit-user');;
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('permission:destroy-user');;
        Route::get('/{user}/edit-password', [UserController::class, 'editPassword'])->name('users.edit_password')->middleware('permission:edit-password-user');;
        Route::put('/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.update_password')->middleware('permission:edit-password-user');;
    });

    // Usuários Status
    Route::prefix('user-statuses')->group(function () {
        Route::get('/', [UserStatusController::class, 'index'])->name('user_statuses.index')->middleware('permission:index-user-status');;
        Route::get('/create', [UserStatusController::class, 'create'])->name('user_statuses.create')->middleware('permission:create-user-status');;
        Route::get('/{userStatus}', [UserStatusController::class, 'show'])->name('user_statuses.show')->middleware('permission:show-user-status');;
        Route::post('/', [UserStatusController::class, 'store'])->name('user_statuses.store')->middleware('permission:create-user-status');;
        Route::get('/{userStatus}/edit', [UserStatusController::class, 'edit'])->name('user_statuses.edit')->middleware('permission:edit-user-status');;
        Route::put('/{userStatus}', [UserStatusController::class, 'update'])->name('user_statuses.update')->middleware('permission:edit-user-status');;
        Route::delete('/{userStatus}', [UserStatusController::class, 'destroy'])->name('user_statuses.destroy')->middleware('permission:destroy-user-status');;
    });

    // Cursos
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('courses.index')->middleware('permission:index-course');
        Route::get('/create', [CourseController::class, 'create'])->name('courses.create')->middleware('permission:create-course');;
        Route::get('/{course}', [CourseController::class, 'show'])->name('courses.show')->middleware('permission:show-course');;
        Route::post('/', [CourseController::class, 'store'])->name('courses.store')->middleware('permission:create-course');;
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit')->middleware('permission:edit-course');;
        Route::put('/{course}', [CourseController::class, 'update'])->name('courses.update')->middleware('permission:edit-course');;
        Route::delete('/{course}', [CourseController::class, 'destroy'])->name('courses.destroy')->middleware('permission:destroy-course');;
    });

    // Cursos Status
    Route::prefix('course-statuses')->group(function () {
        Route::get('/', [CourseStatusController::class, 'index'])->name('course_statuses.index')->middleware('permission:index-course-status');;
        Route::get('/create', [CourseStatusController::class, 'create'])->name('course_statuses.create')->middleware('permission:create-course-status');;
        Route::get('/{courseStatus}', [CourseStatusController::class, 'show'])->name('course_statuses.show')->middleware('permission:show-course-status');;
        Route::post('/', [CourseStatusController::class, 'store'])->name('course_statuses.store')->middleware('permission:create-course-status');;
        Route::get('/{courseStatus}/edit', [CourseStatusController::class, 'edit'])->name('course_statuses.edit')->middleware('permission:edit-course-status');;
        Route::put('/{courseStatus}', [CourseStatusController::class, 'update'])->name('course_statuses.update')->middleware('permission:edit-course-status');;
        Route::delete('/{courseStatus}', [CourseStatusController::class, 'destroy'])->name('course_statuses.destroy')->middleware('permission:destroy-course-status');;
    });

    // Turmas
    Route::prefix('course-batches')->group(function () {
        Route::get('/courses/{course}', [CourseBatchController::class, 'index'])->name('course_batches.index')->middleware('permission:index-course-batch');;
        Route::get('/create/{course}', [CourseBatchController::class, 'create'])->name('course_batches.create')->middleware('permission:create-course-batch');;
        Route::get('/{courseBatch}', [CourseBatchController::class, 'show'])->name('course_batches.show')->middleware('permission:show-course-batch');;
        Route::post('/{course}', [CourseBatchController::class, 'store'])->name('course_batches.store')->middleware('permission:create-course-batch');;
        Route::get('/{courseBatch}/edit', [CourseBatchController::class, 'edit'])->name('course_batches.edit')->middleware('permission:edit-course-batch');;
        Route::put('/{courseBatch}', [CourseBatchController::class, 'update'])->name('course_batches.update')->middleware('permission:edit-course-batch');;
        Route::delete('/{courseBatch}', [CourseBatchController::class, 'destroy'])->name('course_batches.destroy')->middleware('permission:destroy-course-batch');;
    });

    // Módulos
    Route::prefix('modules')->group(function () {
        Route::get('/course-batch/{courseBatch}', [ModuleController::class, 'index'])->name('modules.index')->middleware('permission:index-module');;
        Route::get('/create/{courseBatch}', [ModuleController::class, 'create'])->name('modules.create')->middleware('permission:create-module');;
        Route::get('/{module}', [ModuleController::class, 'show'])->name('modules.show')->middleware('permission:show-module');;
        Route::post('/create/{courseBatch}', [ModuleController::class, 'store'])->name('modules.store')->middleware('permission:create-module');;
        Route::get('/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit')->middleware('permission:edit-module');;
        Route::put('/{module}', [ModuleController::class, 'update'])->name('modules.update')->middleware('permission:edit-module');;
        Route::delete('/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy')->middleware('permission:destroy-module');;
    });

    // Aulas
    Route::prefix('lessons')->group(function () {
        Route::get('/module/{module}', [LessonController::class, 'index'])->name('lessons.index')->middleware('permission:index-lesson');;
        Route::get('/create/{module}', [LessonController::class, 'create'])->name('lessons.create')->middleware('permission:create-lesson');;
        Route::get('/{lesson}', [LessonController::class, 'show'])->name('lessons.show')->middleware('permission:show-lesson');;
        Route::post('/{module}', [LessonController::class, 'store'])->name('lessons.store')->middleware('permission:create-lesson');;
        Route::get('/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit')->middleware('permission:edit-lesson');;
        Route::put('/{lesson}', [LessonController::class, 'update'])->name('lessons.update')->middleware('permission:edit-lesson');;
        Route::delete('/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy')->middleware('permission:destroy-lesson');;
    });
});
