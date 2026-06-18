@extends('layouts.master')

@section('pagetitle', 'Step 2: Multi Options')
@section('header', 'List All Your Options')

@section('sidebar')
    @include('partials.sidebars.decisioncreatemulti')
@endsection

@section('content')
    <div class="row border-start border-light ps-md-4" style="border-opacity: 0.2;">
        <div class="col-md-9">
            <form action="{{ route('decision.store-step2') }}" method="POST">
                @csrf
                
                <div id="optionslist">
                    
                    <label for="option1" class="form-label">Option 1 :</label>
                    <input type="text" class="form-control mb-2" name="options[]" id="option1" value="{{ old('options.0') }}" placeholder="Enter option 1" required>
                    @error('options.0') <p class="text-warning m-0 mt-1" style="font-size: 14px;">* {{$message}}</p> @enderror

                    
                    <label for="option2" class="form-label mt-3">Option 2 :</label>
                    <input type="text" class="form-control mb-2" name="options[]" id="option2" value="{{ old('options.1') }}" placeholder="Enter option 2" required>
                    @error('options.1') <p class="text-warning m-0 mt-1" style="font-size: 14px;">* {{$message}}</p> @enderror
                </div>

                
                <button type="button" class="btn btn-outline-info btn-sm mt-3 mb-4 rounded-0" onclick="addOption()">
                    <i class="bi bi-plus-circle me-1"></i> Add another option
                </button>

                @error('options') <p class="text-warning m-0 mt-2">* {{$message}}</p> @enderror

                <x-button color="bgc-green">Create Decision !</x-button>
            </form>
        </div>
    </div>

 
    <script>
        let i = 2; 
        function addOption() {
            i++; 
            let container = document.getElementById('optionslist');
            let html = `
                <label for="option${i}" class="form-label mt-3">Option ${i} :</label>
                <input type="text" class="form-control mb-2" name="options[]" id="option${i}" placeholder="Enter option ${i}" required>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }
    </script>
@endsection