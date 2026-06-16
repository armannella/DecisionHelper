@extends('layouts.master')

@section('pagetitle' , 'TasmimYar')

@section('header', 'New Decision')

@section('content')

<div class="container-fluid pt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('decision.store-step1') }}" id="decisionCreate1" method="POST">
                            @csrf
                            
                            <label for="title" class="form-label">Title :</label>
                            <input type="text" class="form-control mb-2" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Decision title" required>
                            
                            @error('title')
                                <p class="text-warning">* {{$message}}</p>
                            @enderror

                            <label for="type" class="form-label mt-3">Type :</label>
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" id="multi" name="type" value="multi" autocomplete="off">
                                <label class="btn btn-outline-warning p-4" for="multi">Multi Cases</label>
                            
                            
                                <input type="radio" class="btn-check" id="binary" name="type" value="binary" autocomplete="off" checked>
                                <label class="btn btn-outline-warning p-4" for="binary">Binary Cases</label>
                            </div>
                            
                            <input type="submit"  class="dokme bgc-green mb-3 mt-5" value="Next Step !">
                        </form>
                    </div>
                </div>
                </div>
            </div>
</div>

@endsection