@extends('layouts.master')

@section('pagetitle' , 'TasmimYar')

@section('header', $decision->title)

@section('content')

<div class="container-fluid pt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <a href="{{ $decision->type->value == 'binary' ? route('factor.createBinary' , $decision->id) : route('factor.createMulti',$decision->id) }}" class="tile bgc-green" style="height: 50px"> 
                            <span>New Factor</span>
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a href="#" class="tile bgc-red" style="height: 50px"> 
                            <span>Delete Decision</span>
                            </a>
                        </div>
                    </div> 

                    <div class="row justify-content-center my-4">
    @forelse ($factors as $factor)
        <div class="col-md-4 mb-4">
            <div class="p-3 h-100" style="background-color: rgba(255,255,255,0.1); border: 2px solid rgba(255,255,255,0.5);">
                
                <div class="d-flex justify-content-between align-items-center mb-3 pb-2" style="border-bottom: 1px solid rgba(255,255,255,0.2);">
                    <h3 class="m-0 fw-light text-capitalize">{{ $factor->title }}</h3>
                    <span class="badge bg-warning text-dark fs-6 rounded-0">Weight: {{ $factor->weight }}</span>
                </div>

                <div>
                    <h6 class="fw-light mb-2 opacity-75">Scores:</h6>
                    <ul class="list-unstyled">
                        @foreach ($factor->scores as $score)
                            <li class="d-flex justify-content-between mb-1">
                                <span class="text-capitalize">{{ $score->option->title }}</span>
                                <span class="fw-bold">{{ $score->score }} / 10</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <h2 class="fw-light opacity-50">There is not any Factor Yet</h2>
            <p class="opacity-50">Click "New Factor" to start evaluating your options!</p>
        </div>
    @endforelse
</div>
                    
                    <button class="dokme bgc-purple mb-3 mt-5"><a href="{{ route('decision.result',$decision->id) }}" target="_blank" rel="noopener noreferrer">Calculate Result</a></button>
                    
                </div>
            </div>
</div>

@endsection