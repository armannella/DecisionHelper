@extends('layouts.master')

@section('pagetitle' , 'New Multi Factor')

@section('header', 'Add Multi Factor')

@section('content')

<div class="container-fluid pt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ route('factor.storeMulti', $decision->id) }}" method="POST">
                        @csrf
                        
                        <label for="title" class="form-label">Factor Title :</label>
                        <input type="text" class="form-control mb-2" name="title" id="title" value="{{ old('title') }}" placeholder="e.g., Distance, Cost..." required>
                        @error('title') <p class="text-warning">* {{$message}}</p> @enderror

                        <label for="weight" class="form-label mt-3">Weight (1 to 5) :</label>
                        <input type="number" class="form-control mb-2" name="weight" id="weight" value="{{ old('weight') }}" min="1" max="5" placeholder="How important is this factor?" required>
                        @error('weight') <p class="text-warning">* {{$message}}</p> @enderror

                        <h5 class="mt-5 mb-3 border-bottom pb-2" style="font-weight: 300;">Score each option (1 to 10)</h5>
                        
                        @foreach($options as $option)
                            <label for="score_{{ $option->id }}" class="form-label text-capitalize mt-2">{{ $option->title }} :</label>
                            <input type="number" class="form-control mb-2" name="scores[{{ $option->id }}]" id="score_{{ $option->id }}" value="{{ old('scores.'.$option->id) }}" min="1" max="10" placeholder="Score for {{ $option->title }}" required>
                            
                            @error('scores.'.$option->id) 
                                <p class="text-warning">* {{$message}}</p> 
                            @enderror
                        @endforeach

                        <input type="submit" class="dokme bgc-green mb-3 mt-5" value="Add Factor & Scores !">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection