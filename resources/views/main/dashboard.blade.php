@extends('layouts.master')

@section('pagetitle', 'Dashboard - TasmimYar')
@section('header', 'Welcome, ' . Auth::user()->name . '!')

@section('sidebar')
    @include('partials.sidebars.dashboard')
@endsection

@section('content')
    <div class="row pe-md-4">
        
        <div class="col-md-6 mb-4">
            <x-tile href="{{ route('decision.all') }}" color="bgc-blue" icon="bi-collection" title="My Decisions" />
        </div>

        <div class="col-md-6 mb-4">
            <x-tile href="{{ route('decision.create') }}" color="bgc-green" icon="bi-plus-circle" title="New Decision" />
        </div>

        <div class="col-md-6 mb-4">
                    <x-tile href="{{ route('about.guide') }}" color="bgc-purple" icon="bi-info-circle" title="How to use This App" />
                </div>

        <div class="col-md-6 mb-4">
            <form action="{{ route('auth.logout') }}" method="POST" class="w-100">
                @csrf
                <button type="submit" class="tile bgc-red w-100 text-white" style="cursor: pointer;">
                    <i class="bi bi-box-arrow-right mb-2 fs-1"></i>
                    <h3 class="m-0 fw-light">Logout</h3>
                </button>
            </form>
        </div>

    </div>
@endsection