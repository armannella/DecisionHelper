<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->prefix('auth')->group(function() {
    Route::get('/',[AuthController::class , 'welcome'])->name('auth.welcome');
    Route::get('/register' , [AuthController::class , 'showRegisterForm'])->name('auth.registerForm');
    Route::post('/register' , [AuthController::class , 'register'])->name('auth.register');
    Route::get('/login' , [AuthController::class , 'showLoginForm'])->name('auth.loginForm');
    Route::post('/login' , [AuthController::class , 'login'])->name('auth.login');
});

Route::get('/',[AuthController::class , 'dashboard'])->name("dashboard")->middleware("auth");
Route::post('/logout',[AuthController::class , 'logout'])->name("auth.logout")->middleware("auth");
