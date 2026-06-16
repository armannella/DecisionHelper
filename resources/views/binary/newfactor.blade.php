@extends('layouts.master')

@section('pagetitle' , 'New Binary Factor')

@section('header', 'Add Binary Factor')

@section('content')

<div class="container-fluid pt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ route('factor.storeBinary', $decision->id) }}" method="POST">
                        @csrf
                        
                        <label for="title" class="form-label">Factor Title :</label>
                        <input type="text" class="form-control mb-2" name="title" id="title" value="{{ old('title') }}" placeholder="e.g., Price, Quality..." required>
                        @error('title') <p class="text-warning">* {{$message}}</p> @enderror

                        <label for="weight" class="form-label mt-3">Weight (1 to 5) :</label>
                        <input type="number" class="form-control mb-2" name="weight" id="weight" value="{{ old('weight') }}" min="1" max="5" placeholder="How important is this?" required>
                        @error('weight') <p class="text-warning">* {{$message}}</p> @enderror

                        <label class="form-label mt-4 mb-2">Which option is better for this factor?</label>
                        <div class="btn-group w-100 mb-2" role="group">
                            @foreach($options as $option)
                                <input type="radio" class="btn-check" id="opt{{ $option->id }}" name="option" value="{{ $option->id }}" autocomplete="off" {{ old('option') == $option->id ? 'checked' : '' }} required>
                                <label class="btn btn-outline-warning p-3 text-capitalize" for="opt{{ $option->id }}">{{ $option->title }}</label>
                            @endforeach
                        </div>
                        @error('option') <p class="text-warning">* {{$message}}</p> @enderror

                        <label for="score" class="form-label mt-3">Score for the winner (1 to 10) :</label>
                        <input type="number" class="form-control mb-2" name="score" id="score" value="{{ old('score') }}" min="1" max="10" placeholder="Give a score..." required>
                        @error('score') <p class="text-warning">* {{$message}}</p> @enderror

                        <input type="submit" class="dokme bgc-green mb-3 mt-5" value="Add Factor !">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection