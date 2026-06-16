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
        if($data['type']== DecisionType::BINARY->value){
            return view("binary.step-1");
        }
        if($data['type']== DecisionType::MULTI->value){
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
        $factors = $decision->factors()->with('scores.option')->latest()->get();
        return view("Decision.show" , compact('factors' , 'decision')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Decision $decision)
    {
        $this->authorize('isUserDecision' , $decision);
        return view('Decision.edit' , compact('decision'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Decision $decision)
    {
        $this->authorize('isUserDecision' , $decision);
        $data = $request->validate(["title"=>["required","string","min:5" , "max:255"]]);
        $decision->update(["title" => $request->title]);
        return redirect()->route("decision.show" , $decision->id)->with("success" , "You edited the decision Successfully");
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Decision $decision)
    {
        $this->authorize('delete',$decision);
        $decision->delete();
        return redirect()->route("decision.all")->with('success' , "you deleted the decision successfully");
    }

    public function calculateResults(Decision $decision) {
        $finalscores = $decision->calculateResults();
        return view('Decision.result' , compact('finalscores'));
    }
}
