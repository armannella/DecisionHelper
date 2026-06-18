@extends('layouts.master')

@section('pagetitle', 'Register - TasmimYar')
@section('header', 'Create an Account')

@section('sidebar')
    @include('partials.sidebars.register')
@endsection

@section('content')
    <div class="row justify-content-center border-start border-light ps-md-4" style="border-opacity: 0.2;">
        <div class="col-md-9">
            <form action="{{ route('auth.register') }}" method="POST">
                @csrf
                
                <x-input name="name" label="Full Name" placeholder="e.g. Arman" />
                <x-input type="email" name="email" label="Email Address" placeholder="name@example.com" />
                <x-input type="password" name="password" label="Password" placeholder="Minimum 8 characters" />
                <x-input type="password" name="password_confirmation" label="Confirm Password" placeholder="Confirm your password" />

                <x-button color="bgc-green">Register Now !</x-button>
            </form>
        </div>
    </div>
@endsection