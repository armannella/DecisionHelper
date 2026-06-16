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
                            <x-slot name="route">{{route('decision.create')}}</x-slot>
                            <x-slot name="icon">bi-folder-plus</x-slot>
                            New Decision
                        </x-buttons.tile>
        
                        <x-buttons.tile>
                            <x-slot name="color">red</x-slot>
                            <x-slot name="route">{{route('decision.all')}}</x-slot>
                            <x-slot name="icon">bi-journal-code</x-slot>
                            My Decisions
                        </x-buttons.tile>

                        <x-buttons.tile>
                            <x-slot name="color">orange</x-slot>
                            <x-slot name="route">{{}}</x-slot>
                            <x-slot name="icon">bi-question-square"</x-slot>
                            How to use
                        </x-buttons.tile>

                        <x-buttons.tile>
                            <x-slot name="color">purple</x-slot>
                            <x-slot name="route">{{ route('auth.logout') }}</x-slot>
                            <x-slot name="icon">bi-box-arrow-left</x-slot>
                            Logout
                        </x-buttons.tile>

                    </div>
                </div>
            </div>
        </div>
@endsection
