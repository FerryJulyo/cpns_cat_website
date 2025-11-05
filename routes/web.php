<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Exam Routes
    Route::get('/exam/{id}', [ExamController::class, 'show'])->name('exam.show');
    Route::post('/exam/{id}/start', [ExamController::class, 'start'])->name('exam.start');
    Route::get('/exam/session/{sessionId}', [ExamController::class, 'take'])->name('exam.take');
    Route::post('/exam/session/{sessionId}/answer', [ExamController::class, 'saveAnswer'])->name('exam.saveAnswer');
    Route::post('/exam/session/{sessionId}/submit', [ExamController::class, 'submit'])->name('exam.submit');
    Route::get('/exam/session/{sessionId}/result', [ExamController::class, 'result'])->name('exam.result');
});