@extends('layouts.master')

@section('pagetitle' , 'TasmimYar')

@section('header', 'New Decision')

@section('content')

<div class="container-fluid pt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('decision.store-step2') }}" id="decisionCreate2" method="POST">
                            @csrf
                            
                            <div class="optionslist" id="optionslist">

                            <label for="option1" class="form-label">Option 1 :</label>
                            <input type="text" class="form-control mb-2" name="options[]" id="option1" value="{{ old('options.0') }}" placeholder="Enter Case 1 title" required>
                            
                            @error('options.0')
                                <p class="text-warning">* {{$message}}</p>
                            @enderror

                            <label for="option2" class="form-label">Option 2 :</label>
                            <input type="text" class="form-control mb-2" name="options[]" id="option2" value="{{ old('options.1') }}" placeholder="Enter case 2 title" required>
                            @error('options.1')
                                <p class="text-warning">* {{$message}}</p>
                            @enderror
                            
                        
                            </div>
                            
                            <button type="button" class="btn btn-outline-light btn-sm my-4" onclick="addOption()">
                                <i class="bi bi-plus-circle"></i> Add another option
                            </button>
                            @error('options')
                                 <p class="text-warning">* {{$message}}</p>
                             @enderror

                            
                            <input type="submit"  class="dokme bgc-green mb-3 mt-5" value="Create !">
                        </form>
                    </div>
                </div>
                </div>
            </div>
</div>

<script>
   let i = 2; 

    function addOption() {
        i++;
        let container = document.getElementById('optionslist');
        let html = `
            <label for="option${i}" class="form-label mt-3">Option ${i} :</label>
            <input type="text" class="form-control mb-2" name="options[]" id="option${i}" placeholder="Enter case ${i} title" required>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }
</script>
@endsection