@extends('layouts.master')

@section('pagetitle', 'Welcome to TasmimYar')
@section('header', "TasmimYar")

@section('content')
    <div class="row justify-content-center text-center mt-4">
        <div class="col-md-10">
            
            <i class="bi bi-bezier2 text-warning mb-2 d-block" style="font-size: 80px;"></i>
            <h1 class="fw-light mb-3" style="font-size: 40px;">Make Better Decisions with Logic!</h1>
            <p class="fs-5 opacity-75 mb-5 px-md-5">
                TasmimYar helps you analyze your choices logically, step by step. 
                For when you are stuck between several options for a decision and you have your reasons for each option.
            </p>

            <div class="row justify-content-center">
                <div class="col-md-5 col-12 mb-3">
                    <x-tile href="{{ route('auth.registerForm') }}" color="bgc-green" icon="bi-person-plus" title="Get Started (Register)" />
                </div>
                
                <div class="col-md-5 col-12 mb-3">
                    <x-tile href="{{ route('auth.loginForm') }}" color="bgc-blue" icon="bi-box-arrow-in-right" title="I have an account (Login)" />
                </div>

                <div class="col-md-5 col-12 mb-3">
                    <x-tile href="{{ route('about.guide') }}" color="bgc-purple" icon="bi-info-circle" title="How to use This App" />
                </div>
                
                <div class="col-md-5 col-12 mb-3">
                    <x-tile href="https://www.linkedin.com/in/armannella/" color="bgc-red" icon="bi-linkedin" title="َAbout Me" />
                </div>
            </div>

        </div>
    </div>
@endsection