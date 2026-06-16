<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function welcome(){
        return view('main.welcome');
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(RegisterRequest $registerRequest){

        $user = User::create($registerRequest->validated());
        Auth::login($user);
        Log::channel('personal')->info("User Registered" , ["user_id" => $user->id , "email" => $user->email]);
        return redirect()->route('dashboard')->with("success","Welcome dear {$user->name} . you successfully registered !");
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(LoginRequest $loginRequest){
        if(Auth::attempt($loginRequest->validated())){
            $loginRequest->session()->regenerate();
            Log::channel('personal')->info("User Login" , ["user_id" => Auth::id() , "email" => Auth::user()->email]);
            return redirect()->route("dashboard")->with("success","Welcome dear " . Auth::user()->name . " !");
        }

        return back()->withErrors(["email" => "email or password is invalid"])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("auth.welcome")->with("success" , "bye bye !");
    }

    public function dashboard(){
        return view('main.dashboard');
    }
}
