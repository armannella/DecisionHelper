@extends('layouts.master')

@section('pagetitle', 'Login - TasmimYar')
@section('header', 'Welcome Back')

@section('sidebar')
    @include('partials.sidebars.login')
@endsection

@section('content')
    <div class="row justify-content-center border-start border-light ps-md-4" style="border-opacity: 0.2;">
        <div class="col-md-9">
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                
                <x-input type="email" name="email" label="Email Address" placeholder="name@example.com" />
                <x-input type="password" name="password" label="Password" placeholder="Enter your password" />

                <x-button color="bgc-blue">Login !</x-button>
            </form>
        </div>
    </div>
@endsection