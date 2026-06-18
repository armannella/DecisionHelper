@extends('layouts.master')

@section('pagetitle', 'New Binary Factor')
@section('header', 'Add Binary Factor')

@section('sidebar')
    @include('partials.sidebars.newfactor')
@endsection

@section('content')
    <div class="row border-start border-light ps-md-4" style="border-opacity: 0.2;">
        <div class="col-md-9">
            <form action="{{ route('factor.storeBinary', $decision->id) }}" method="POST">
                @csrf
                
                <x-input name="title" label="Factor Title" placeholder="e.g., Cost, Quality..." />
                <x-input type="number" name="weight" label="Weight (1 to 5)" min="1" max="5" placeholder="Importance of this factor" />

                
                <label class="form-label mt-4 mb-2">Which option is for this factor?</label>
                <div class="btn-group w-100 mb-2" role="group">
                    @foreach($options as $option)
                        <input type="radio" class="btn-check" id="opt{{ $option->id }}" name="option" value="{{ $option->id }}" autocomplete="off" {{ old('option') == $option->id ? 'checked' : '' }} required>
                        <label class="btn btn-outline-warning p-3 text-capitalize" for="opt{{ $option->id }}">{{ $option->title }}</label>
                    @endforeach
                </div>
                @error('option') <p class="text-warning m-0 mt-1" style="font-size: 14px;">* {{$message}}</p> @enderror

                <x-input type="number" name="score" label="Score (1 to 10)" min="1" max="10" placeholder="Give a score..." />

                <div class="d-flex gap-3">
                    <x-button color="bgc-green">Add Factor</x-button>
                    <a href="{{ route('decision.show', $decision->id) }}" class="btn btn-outline-light rounded-0 mt-5 mb-3 d-flex align-items-center px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection