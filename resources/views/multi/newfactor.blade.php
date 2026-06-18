@extends('layouts.master')

@section('pagetitle', 'New Multi Factor')
@section('header', 'Add Multi Factor')

@section('sidebar')
    @include('partials.sidebars.newfactor')
@endsection

@section('content')
    <div class="row border-start border-light ps-md-4" style="border-opacity: 0.2;">
        <div class="col-md-9">
            <form action="{{ route('factor.storeMulti', $decision->id) }}" method="POST">
                @csrf
                
                <x-input name="title" label="Factor Title" placeholder="e.g., Distance, Cost..." />
                <x-input type="number" name="weight" label="Weight (1 to 5)" min="1" max="5" placeholder="How important is this?" />

                <div class="mt-5 p-4" style="background-color: var(--glass-bg); border: 1px solid var(--glass-border);">
                    <h5 class="fw-light mb-3 border-bottom border-light border-opacity-25 pb-2">Score each option (1 to 10)</h5>
                    
                    @foreach($options as $option)
                        <x-input 
                            type="number" 
                            name="scores[{{ $option->id }}]" 
                            label="{{ $option->title }}" 
                            min="1" max="10" 
                            placeholder="Score for {{ $option->title }}" 
                        />
                    @endforeach
                </div>

                <div class="d-flex gap-3">
                    <x-button color="bgc-green">Save Scores</x-button>
                    <a href="{{ route('decision.show', $decision->id) }}" class="btn btn-outline-light rounded-0 mt-5 mb-3 d-flex align-items-center px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection