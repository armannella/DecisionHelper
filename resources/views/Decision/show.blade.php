@extends('layouts.master')

@section('pagetitle', $decision->title . ' - TasmimYar')
@section('header', $decision->title)

@section('sidebar')
    @include('partials.sidebars.decisionshow')
@endsection

@section('content')
    <div class="row pe-md-4">
        
        
        <div class="col-12 mb-4 d-flex flex-wrap gap-2">
            
            <a href="{{ $decision->type->value == 'binary' ? route('factor.createBinary', $decision->id) : route('factor.createMulti', $decision->id) }}" class="btn btn-success rounded-0 px-4">
                <i class="bi bi-plus-lg me-1"></i> New Factor
            </a>
            
            <a href="{{ route('decision.result', $decision->id) }}" class="btn btn-primary rounded-0 px-4" style="background-color: var(--metro-purple); border:none;">
                <i class="bi bi-magic me-1"></i> Calculate Result
            </a>

            <a href="{{ route('decision.edit', $decision->id) }}" class="btn btn-outline-light rounded-0 px-4">
                <i class="bi bi-pencil-square me-1"></i> Edit Title
            </a>

            <button type="button" class="btn btn-danger rounded-0 px-4 ms-auto" data-bs-toggle="modal" data-bs-target="#deleteDecisionModal">
                <i class="bi bi-trash me-1"></i> Delete Decision
            </button>
        </div>

        <x-modal id="deleteDecisionModal" title="Delete Decision?" action="{{ route('decision.delete', $decision->id) }}">
            Are you sure you want to delete <strong>"{{ $decision->title }}"</strong>?<br>
            <span class="fs-6 text-danger mt-2 d-block">All factors and scores will be lost permanently!</span>
        </x-modal>

        <hr class="border-light opacity-25 mb-4">


        @forelse ($factors as $factor)
            <div class="col-md-6 mb-4">
                <div class="p-4 h-100 position-relative" style="background-color: var(--glass-bg); border: 2px solid var(--glass-border);">
                    
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom border-light border-opacity-25">
                        <h4 class="m-0 fw-light text-capitalize">{{ $factor->title }}</h4>
                        <span class="badge bg-warning text-dark rounded-0 px-2 py-1">Weight: {{ $factor->weight }}</span>
                    </div>

                    
                    <ul class="list-unstyled mb-4">
                        @foreach ($factor->scores as $score)
                            <li class="d-flex justify-content-between mb-2 opacity-75">
                                <span class="text-capitalize"><i class="bi bi-chevron-right text-info me-1" style="font-size:12px;"></i> {{ $score->option->title }}</span>
                                <span class="fw-bold text-white">{{ $score->score }} / 10</span>
                            </li>
                        @endforeach
                    </ul>

                    
                    <div class="position-absolute bottom-0 end-0 m-3">
                        <a href="{{ route('factor.edit', [$decision->id, $factor->id]) }}" class="text-info me-3"><i class="bi bi-pencil"></i></a>
                        <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteFactor{{ $factor->id }}"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>

            <x-modal id="deleteFactor{{ $factor->id }}" title="Delete Factor?" action="{{ route('factor.delete', [$decision->id, $factor->id]) }}">
                Are you sure you want to remove the <strong>"{{ $factor->title }}"</strong> factor?
            </x-modal>

        @empty
            <div class="col-12 text-center py-5">
                <h3 class="fw-light opacity-50">No Factors Added Yet</h3>
                <p class="opacity-50">Click "New Factor" to start evaluating your options.</p>
            </div>
        @endforelse

    </div>
@endsection