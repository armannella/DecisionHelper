<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\OptionController;
use App\Models\Decision;
use App\Models\Option;
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

Route::middleware("auth")->prefix("decisions")->group(function () {
    Route::get('/',[DecisionController::class,"index"])->name("decision.all");
    Route::get('/create' , [DecisionController::class , "create"])->name('decision.create');
    Route::post('/create/step-1' , [DecisionController::class , 'store'])->name('decision.store-step1');
    Route::get('/create/step2' , [DecisionController::class , "createStep2"])->name("decision.create2");
    Route::post('/' , [OptionController::class , "store"])->name("decision.store-step2");
    Route::get('/{decision}' , [DecisionController::class , "show"])->name("decision.show");
    Route::get("/{decision}/factor/binary" ,[FactorController::class,'createBinary'])->name("factor.createBinary");
    Route::post("/{decision}/factor/binary" ,[FactorController::class,'storeBinary'])->name("factor.storeBinary");
    Route::get("/{decision}/factor/multi" ,[FactorController::class,'createMulti'])->name("factor.createMulti");
    Route::post("/{decision}/factor/multi" ,[FactorController::class,'storeMulti'])->name("factor.storeMulti");
    Route::get("/{decision}/result" ,[DecisionController::class, 'calculateResults'])->name("decision.result");
});
