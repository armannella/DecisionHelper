@extends('layouts.master')

@section('pagetitle', 'Step 1: New Decision')
@section('header', 'Create a New Decision')

@section('sidebar')
    @include('partials.sidebars.decisioncreatestep1')
@endsection

@section('content')
    <div class="row border-start border-light ps-md-4" style="border-opacity: 0.2;">
        <div class="col-md-9">
            <form action="{{ route('decision.store-step1') }}" id="decisionCreate1" method="POST">
                @csrf
                
                <x-input name="title" label="Decision Title" placeholder="e.g. Buying a new house" />
                
                <label class="form-label mt-4 mb-3">Decision Type :</label>
                <div class="btn-group w-100" role="group">
                    
                    <input type="radio" class="btn-check" id="multi" name="type" value="multi" autocomplete="off" {{ old('type') == 'multi' ? 'checked' : '' }}>
                    <label class="btn btn-outline-warning p-3 p-md-4" for="multi">
                        <i class="bi bi-ui-radios-grid d-block mb-2 fs-3"></i> Multi Cases
                    </label>

                    <input type="radio" class="btn-check" id="binary" name="type" value="binary" autocomplete="off" {{ old('type', 'binary') == 'binary' ? 'checked' : '' }}>
                    <label class="btn btn-outline-warning p-3 p-md-4" for="binary">
                        <i class="bi bi-symmetry-vertical d-block mb-2 fs-3"></i> Binary Cases
                    </label>
                    
                </div>
                
                @error('type')
                    <p class="text-warning m-0 mt-2" style="font-size: 14px;">* {{ $message }}</p>
                @enderror

                <x-button color="bgc-green">Next Step <i class="bi bi-arrow-right ms-2"></i></x-button>
            </form>
        </div>
    </div>
@endsection