@extends('layouts.master')

@section('pagetitle', 'Edit Binary Factor')
@section('header', 'Edit Factor')

@section('sidebar')
    <p>Did you change your mind?</p>
    <p>You can adjust the factor's name, its importance (weight), or change the winning option and its score.</p>
@endsection

@section('content')
    <div class="row border-start border-light ps-md-4" style="border-opacity: 0.2;">
        <div class="col-md-9">
            <form action="{{ route('factor.updatebinary', [$decision->id, $factor->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <x-input name="title" label="Factor Title" value="{{ $factor->title }}" />
                <x-input type="number" name="weight" label="Weight (1 to 5)" value="{{ $factor->weight }}" min="1" max="5" />

                <!-- گرفتن اسکور قبلی برای پر کردن فیلدها -->
                @php $winnerScore = $factor->scores->first(); @endphp

                <label class="form-label mt-4 mb-2">Which option is better for this factor?</label>
                <div class="btn-group w-100 mb-2" role="group">
                    @foreach($decision->options as $option)
                        <input type="radio" class="btn-check" id="opt{{ $option->id }}" name="option" value="{{ $option->id }}" autocomplete="off" {{ old('option', $winnerScore->option_id ?? '') == $option->id ? 'checked' : '' }} required>
                        <label class="btn btn-outline-warning p-3 text-capitalize" for="opt{{ $option->id }}">{{ $option->title }}</label>
                    @endforeach
                </div>
                @error('option') <p class="text-warning m-0 mt-1" style="font-size: 14px;">* {{$message}}</p> @enderror

                <x-input type="number" name="score" label="Score for the winner (1 to 10)" value="{{ $winnerScore->score ?? '' }}" min="1" max="10" />

                <div class="d-flex gap-3">
                    <x-button color="bgc-blue">Update Factor</x-button>
                    <a href="{{ route('decision.show', $decision->id) }}" class="btn btn-outline-light rounded-0 mt-5 mb-3 d-flex align-items-center px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection