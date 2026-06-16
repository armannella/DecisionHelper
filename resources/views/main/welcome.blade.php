@extends('layouts.master')


@section('pagetitle' , 'Tasmim Yar')

@section('header' , 'Welcome')

@section('content')

<div class="container-fluid pt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">

                        <x-buttons.tile>
                            <x-slot name="color">green</x-slot>
                            <x-slot name="route">{{route('auth.registerForm')}}</x-slot>
                            <x-slot name="icon">bi-person-plus-fill</x-slot>
                            Register
                        </x-buttons.tile>
        
                        <x-buttons.tile>
                            <x-slot name="color">red</x-slot>
                            <x-slot name="route">{{route('auth.loginForm')}}</x-slot>
                            <x-slot name="icon">bi-person-check-fill</x-slot>
                            Login
                        </x-buttons.tile>

                        <x-buttons.tile>
                            <x-slot name="color">orange</x-slot>
                            <x-slot name="route">{{}}</x-slot>
                            <x-slot name="icon">bi-question-square"</x-slot>
                            How to use
                        </x-buttons.tile>

                        <x-buttons.tile>
                            <x-slot name="color">purple</x-slot>
                            <x-slot name="route">https://www.linkedin.com/in/armannella/</x-slot>
                            <x-slot name="icon">bi-info-square</x-slot>
                            About me
                        </x-buttons.tile>

                    </div>
                </div>
            </div>
        </div>
@endsection
