@extends('layouts.master')

@section('pagetitle' , 'Decision Result')

@section('header', 'Final Ranking')

@section('content')

<div class="container-fluid pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h3 class="fw-light mb-4 text-center">Here is what logic says you should choose:</h3>

            <table>
                <thead>
                    <tr>
                        <th style="width: 15%;">Rank</th>
                        <th style="width: 50%; text-align: left;">Option Title</th>
                        <th style="width: 35%;">Total Score</th>
                    </tr>
                </thead>
                <tbody>
                    @php $rank = 1; @endphp
                    
                    @foreach($finalscores as $optionTitle => $score)
                        <tr style="{{ $rank == 1 ? 'background-color: rgba(4, 160, 85, 0.3); border: 2px solid #0bea4a; font-weight: 500;' : '' }}">
                            <td style="font-size: {{ $rank == 1 ? '24px' : '18px' }};">
                                @if($rank == 1) 🥇 @elseif($rank == 2) 🥈 @elseif($rank == 3) 🥉 @else #{{ $rank }} @endif
                            </td>
                            
                            <td style="text-align: left; font-size: {{ $rank == 1 ? '24px' : '18px' }};">
                                {{ $optionTitle }}
                                @if($rank == 1) <span class="badge bg-success ms-2 fs-6">Winner</span> @endif
                            </td>
                            
                            <td style="font-size: {{ $rank == 1 ? '24px' : '18px' }};">{{ $score }} pts</td>
                        </tr>
                        @php $rank++; @endphp
                    @endforeach
                </tbody>
            </table>

            <div class="text-center mt-5">
                <a href="{{ route('dashboard') }}" class="dokme bgc-blue d-inline-block px-5" style="width: auto; line-height: 50px;">
                    <i class="bi bi-house-door me-2"></i> Back to Dashboard
                </a>
            </div>

        </div>
    </div>
</div>

@endsection