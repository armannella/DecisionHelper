@extends('layouts.master')

@section('pagetitle', 'Edit Decision Title')
@section('header', 'Edit Decision')


@section('content')
    <div class="row border-start border-light ps-md-4" style="border-opacity: 0.2;">
        <div class="col-md-9">
            <form action="{{ route('decision.update', $decision->id) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <x-input name="title" label="Decision Title" value="{{ $decision->title }}" placeholder="Enter new title..." />
                
                <div class="d-flex gap-3">
                    <x-button color="bgc-blue">Update Title</x-button>
                    <a href="{{ route('decision.show', $decision->id) }}" class="btn btn-outline-light rounded-0 mt-5 mb-3 d-flex align-items-center px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection