<?php

namespace App\Http\Controllers;

use App\DecisionType;
use App\Http\Requests\NewDecisionRequest;
use App\Models\Decision;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DecisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $decisions = $user->decisions()->latest()->get();
        return view("Decision.all" , compact('decisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Decision.create');
    }

    public function createStep2()
    {
        if(!session()->has('decisionData'))
        {
                return view('Decision.create');
        }
        $data = session()->get('decisionData');
        if($data['type']=== DecisionType::BINARY){
            return view("binary.step-1");
        }
        if($data['type']=== DecisionType::MULTI){
            return view("multi.step-1");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewDecisionRequest $request)
    {
        $data = $request->validated();
        session()->put("decisionData" , $data);
        return redirect()->route("decision.create2");
    }

    /**
     * Display the specified resource.
     */
    public function show(Decision $decision)
    {
        $this->authorize('view' , $decision);
        $factors = $decision->factors()->latest()->get();
        return view("Decision.show" , compact('factors')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Decision $decision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Decision $decision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Decision $decision)
    {
        //
    }

    public function calculateResults(Decision $decision) {
        $options = $decision->options()->get();
        $finalscores = [];
        foreach($options as $option) {
            $scores = Score::where('option_id', $option->id)->get();
            $total_score_option = 0 ;
            foreach($scores as $score){
                $total_score_option += ($score->score * $score->factor->weight);
            }
            $finalscores[$option->id] = $total_score_option;
        }

        arsort($finalscores);
        return view('decision.result' , compact('finalscores'));
    }
}
