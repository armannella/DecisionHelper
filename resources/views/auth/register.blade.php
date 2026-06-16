@extends('layouts.master')


@section('pagetitle' , 'Tasmim Yar')

@section('header' , 'Register')

@section('content')

<div class="container-fluid pt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('auth.register') }}" id="registerForm" method="POST">
                            @csrf
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" class="form-control mb-2" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Your Name" required>
                            @error('name')
                                <p class="text-warning">* {{$message}}</p>
                            @enderror
                            
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control mb-2" name="email" id="email"  value="{{ old('email') }}" placeholder="Enter Your email" required>
                            
                            @error('email')
                                <p class="text-warning">* {{$message}}</p>
                            @enderror


                            <label for="password" class="form-label">Password :</label>
                            <input type="password" class="form-control mb-3" name="password" id="password" placeholder="password (at least 8 characters)" required minlength="8">
                            
                            @error('password')
                                <p class="text-warning">* {{$message}}</p>
                            @enderror


                            <label for="password_confirmation" class="form-label">Password Confirmation :</label>
                            <input type="password" class="form-control mb-3" name="password_confirmation" id="password_confirmation" placeholder="Confrim password" required minlength="8">
                            
                            @error('password_confirmation')
                                <p class="text-warning">* {{$message}}</p>
                            @enderror

                            <input type="submit"  class="dokme bgc-green mb-3 mt-2" value="Register !">
                        </form>
                        <h4 class="form-footer">Already have an account ? <span><a href="{{ route('auth.loginForm') }}">Sign in</a></span> !</h4>
                    </div>
                </div>
                </div>
            </div>
</div>
@endsection
