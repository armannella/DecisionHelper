@extends('layouts.master')

@section('pagetitle', 'Step 2: Binary Options')
@section('header', 'Define Your Two Choices')

@section('sidebar')
    @include('partials.sidebars.decisioncreatebinary')
@endsection

@section('content')
    <div class="row border-start border-light ps-md-4" style="border-opacity: 0.2;">
        <div class="col-md-9">
            <form action="{{ route('decision.store-step2') }}" method="POST">
                @csrf
                
                <label for="option1" class="form-label">Option 1 :</label>
                <input type="text" class="form-control mb-2" name="options[]" id="option1" value="{{ old('options.0') }}" placeholder="Enter first choice" required>
                @error('options.0') <p class="text-warning m-0 mt-1" style="font-size: 14px;">* {{$message}}</p> @enderror

                <label for="option2" class="form-label mt-4">Option 2 :</label>
                <input type="text" class="form-control mb-2" name="options[]" id="option2" value="{{ old('options.1') }}" placeholder="Enter second choice" required>
                @error('options.1') <p class="text-warning m-0 mt-1" style="font-size: 14px;">* {{$message}}</p> @enderror

                @error('options') <p class="text-warning m-0 mt-3">* {{$message}}</p> @enderror

                <x-button color="bgc-green">Create Decision !</x-button>
            </form>
        </div>
    </div>
@endsection