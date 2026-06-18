@extends('layouts.master')

@section('pagetitle', 'Edit Multi Factor')
@section('header', 'Edit Factor')


@section('content')
    <div class="row border-start border-light ps-md-4" style="border-opacity: 0.2;">
        <div class="col-md-9">
            <form action="{{ route('factor.updatemulti', [$decision->id, $factor->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <x-input name="title" label="Factor Title" value="{{ $factor->title }}" />
                <x-input type="number" name="weight" label="Weight (1 to 5)" value="{{ $factor->weight }}" min="1" max="5" />

                <div class="mt-5 p-4" style="background-color: var(--glass-bg); border: 1px solid var(--glass-border);">
                    <h5 class="fw-light mb-3 border-bottom border-light border-opacity-25 pb-2">Update Scores (1 to 10)</h5>
                    
                    @foreach($decision->options as $option)
                        \
                        @php 
                            $existingScore = $factor->scores->where('option_id', $option->id)->first(); 
                        @endphp
                        
                        <x-input 
                            type="number" 
                            name="scores[{{ $option->id }}]" 
                            label="{{ $option->title }}" 
                            value="{{ $existingScore ? $existingScore->score : '' }}"
                            min="1" max="10" 
                        />
                    @endforeach
                </div>

                <div class="d-flex gap-3">
                    <x-button color="bgc-blue">Update Scores</x-button>
                    <a href="{{ route('decision.show', $decision->id) }}" class="btn btn-outline-light rounded-0 mt-5 mb-3 d-flex align-items-center px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection