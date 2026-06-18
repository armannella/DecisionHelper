@extends('layouts.master')

@section('pagetitle', 'My Decisions')
@section('header', 'My Decisions')

@section('sidebar')
    @include('partials.sidebars.decisionall')
@endsection

@section('content')
    <div class="row pe-md-4">
        
        <div class="col-md-4 col-6 mb-4">
            <x-tile href="{{ route('decision.create') }}" color="bgc-green" icon="bi-plus-circle" title="New Decision" />
        </div>

        @forelse ($decisions as $decision)
            <div class="col-md-4 col-6 mb-4">
                <x-tile href="{{ route('decision.show', $decision->id) }}" color="bgc-purple" icon="bi-journal-bookmark" title="{{ $decision->title }}">
                    <span class="badge bg-dark position-absolute top-0 end-0 m-3" style="opacity: 0.8;">
                        {{ $decision->type->value ?? $decision->type }}
                    </span>
                </x-tile>
            </div>
        @empty
            <div class="col-12 text-center py-5 mt-4">
                <i class="bi bi-folder-x mb-3 text-secondary" style="font-size: 80px; opacity: 0.3;"></i>
                <h3 class="fw-light opacity-50">No decisions yet!</h3>
                <p class="opacity-50">Click the green tile to start making logic-based choices.</p>
            </div>
        @endforelse

    </div>
@endsection