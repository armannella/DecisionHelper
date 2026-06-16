@extends('layouts.master')


@section('pagetitle' , 'Tasmim Yar')

@section('header' , 'Login')

@section('content')

<div class="container-fluid pt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('auth.login') }}" id="loginForm" method="POST">
                            @csrf
                            
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control mb-2" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Your email" required>
                            
                            @error('email')
                                <p class="text-warning">* {{$message}}</p>
                            @enderror

                            <label for="password" class="form-label">Password :</label>
                            <input type="password" class="form-control mb-3" name="password" id="password" placeholder="password (at least 8 characters)" required minlength="8">
                            
                            <input type="submit"  class="dokme bgc-green mb-3 mt-2" value="Login !">
                        </form>
                        <h4 class="form-footer">Already have an account ? <span><a href="{{ route('auth.registerForm') }}">Register</a></span> !</h4>
                    </div>
                </div>
                </div>
            </div>
</div>
@endsection
