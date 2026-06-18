@extends('layouts.master')

@section('pagetitle', 'Final Result - TasmimYar')
@section('header', 'Logical Conclusion')

@section('content')
    @php
        
        $maxScore = empty($finalscores) ? 0 : max($finalscores);
        $winnersCount = $maxScore > 0 ? count(array_keys($finalscores, $maxScore)) : 0;
        
        $rank = 1;
    @endphp

    <div class="row justify-content-center mt-3 mb-5">
        <div class="col-md-9">

            @if($maxScore == 0)
                <div class="text-center py-5" style="background-color: var(--glass-bg); border: 1px solid var(--glass-border);">
                    <i class="bi bi-exclamation-circle text-warning mb-3 d-block" style="font-size: 60px;"></i>
                    <h3 class="fw-light mb-3">No Factors Evaluated Yet!</h3>
                    <p class="opacity-75 mb-4 px-3">We cannot calculate a logical result because no scores have been given yet.</p>
                    <a href="{{ route('decision.show', request()->route('decision')) }}" class="btn btn-warning rounded-0 px-4 py-2">
                        <i class="bi bi-plus-lg me-2"></i> Go Back and Add Factors
                    </a>
                </div>
            @else
                <div class="text-center mb-5">
                    @if($winnersCount > 1)
                        <i class="bi bi-people-fill text-info mb-3 d-block" style="font-size: 60px;"></i>
                        <h3 class="fw-light mb-2">We have a Tie!</h3>
                        <p class="opacity-75">It seems multiple options are equally logical based on your scores.</p>
                    @else
                        <i class="bi bi-trophy-fill text-warning mb-3 d-block" style="font-size: 60px;"></i>
                        <h3 class="fw-light mb-2">Here is what logic suggests you should choose:</h3>
                    @endif
                </div>

                <div class="d-flex flex-column gap-3">
                    @foreach($finalscores as $optionTitle => $score)
                        @php
                            $isWinner = ($score == $maxScore && $maxScore > 0);
                            $percentage = $maxScore > 0 ? round(($score / $maxScore) * 100) : 0;
                        @endphp

                        <div class="p-3 p-md-4 position-relative" style="background-color: var(--glass-bg); border: 2px solid {{ $isWinner ? 'var(--metro-green)' : 'var(--glass-border)' }}; transition: transform 0.3s ease;">
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="m-0 fw-light d-flex align-items-center text-capitalize">
                                    <span class="me-3 fs-5 opacity-50">#{{ $rank }}</span>
                                    {{ $optionTitle }}
                                    
                                    @if($isWinner)
                                        <span class="badge bg-success ms-3 fs-6 rounded-0"><i class="bi bi-check2-circle me-1"></i>WINNER</span>
                                    @endif
                                </h4>
                                <h3 class="m-0 fw-bold">{{ $score }} <span class="fs-6 fw-light opacity-50">pts</span></h3>
                            </div>

                            <div class="progress rounded-0" style="height: 6px; background-color: rgba(255,255,255,0.1);">
                                <div class="progress-bar {{ $isWinner ? 'bg-success' : 'bg-secondary' }}" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>

                        @php $rank++; @endphp
                    @endforeach
                </div>

                <div class="mt-5 text-center">
                    <a href="{{ route('decision.show', request()->route('decision')) }}" class="btn btn-outline-light rounded-0 px-5 py-2">
                        <i class="bi bi-arrow-left me-2"></i> Back to Dashboard
                    </a>
                </div>
            @endif

        </div>
    </div>
@endsection