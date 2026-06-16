@extends('layouts.master')

@section('pagetitle' , 'My Decisions')

@section('header', 'My Decisions')

@section('content')

<div class="container-fluid pt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="row">
                @forelse ($decisions as $decision)
                    <div class="col-md-3 col-6 mb-3">
                        <a href="{{ route('decision.show', $decision->id) }}" class="tile bgc-blue"> 
                            <i class="bi bi-journal-bookmark mb-2" style="font-size: 50px;"></i>
                            <h3 class="m-0 fw-light text-capitalize">{{ $decision->title }}</h3>
                            <span class="badge bg-dark mt-2" style="opacity: 0.8;">{{ $decision->type->value ?? $decision->type }}</span>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-folder-x mb-3" style="font-size: 80px; opacity: 0.5;"></i>
                        <h2 class="fw-light opacity-50">You haven't created any decisions yet!</h2>
                        <a href="{{ route('decision.create') }}" class="dokme bgc-green mt-4 px-5" style="display: inline-block; width: auto; line-height: 50px;">Create your first decision</a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>

@endsection