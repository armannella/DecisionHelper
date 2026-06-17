<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->prefix('auth')->controller(AuthController::class)->group(function() {
    Route::get('/', 'welcome')->name('auth.welcome');
    Route::get('/register' , 'showRegisterForm')->name('auth.registerForm');
    Route::post('/register' , 'register')->name('auth.register');
    Route::get('/login' ,  'showLoginForm')->name('auth.loginForm');
    Route::post('/login' , 'login')->name('auth.login');
});

Route::middleware('auth')->group(function(){

    Route::controller(AuthController::class)->group(function(){
        Route::get('/', 'dashboard')->name("dashboard");
        Route::post('/logout','logout')->name("auth.logout");

        // Route::prefix('profile')->controller(ProfileController::class)->group(function(){
        //     Route::get('/','showProfile')->name('profile.show');
        // });
    });

    Route::prefix("decisions")->group(function () {
        Route::controller(DecisionController::class)->group(function() {
            Route::get('/',"index")->name("decision.all");
            Route::get('/create' , "create")->name('decision.create');
            Route::post('/create/step-1', 'store')->name('decision.store-step1');
            Route::get('/create/step2', "createStep2")->name("decision.create2");
            Route::get('/{decision}', "show")->name("decision.show");
            Route::delete('/{decision}', "destroy")->name("decision.delete");
            Route::get("/{decision}/result" , 'calculateResults')->name("decision.result");
            Route::get("/{decision}/edit" , 'edit')->name("decision.edit");
            Route::patch("/{decision}" , 'update')->name("decision.update");
        });

        Route::controller(FactorController::class)->group(function(){
            Route::get("/{decision}/factor/binary" ,'createBinary')->name("factor.createBinary");
            Route::post("/{decision}/factor/binary" ,'storeBinary')->name("factor.storeBinary");
            Route::get("/{decision}/factor/multi" ,'createMulti')->name("factor.createMulti");
            Route::post("/{decision}/factor/multi" ,'storeMulti')->name("factor.storeMulti");
    
            Route::delete('/{decision}/factor/{factor}' , "destroy")->name("factor.delete");
            Route::get('/{decision}/factor/{factor}/edit' , "edit")->name("factor.edit");
            Route::patch('/{decision}/factor/{factor}/binary' , "updateBinary")->name("factor.updatebinary");
            Route::patch('/{decision}/factor/{factor}/multi' , "updateMulti")->name("factor.updatemulti");
        });

        Route::post('/' , [OptionController::class , "store"])->name("decision.store-step2");
    });

});
