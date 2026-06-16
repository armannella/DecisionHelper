<?php

namespace App\Http\Controllers;

use App\DecisionType;
use App\Http\Requests\NewBinaryFactor;
use App\Http\Requests\NewBinaryFactorRequest;
use App\Http\Requests\NewMultiFactorRequest;
use App\Models\Decision;
use App\Models\Factor;
use App\Models\Option;
use App\Models\Score;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate as FacadesGate;

class FactorController extends Controller
{
    public function createBinary(Decision $decision){

        $this->authorize('isUserDecision',$decision);
        $this->authorize('isDecisionBinary',$decision);

        $options = $decision->options()->latest()->get();
        return view('binary.newfactor' , compact('options','decision'));
    }

    public function createMulti(Decision $decision){

        $this->authorize('isUserDecision',$decision);
        $this->authorize('isDecisionMulti',$decision);
        $options = $decision->options()->latest()->get();
        return view('multi.newfactor', compact('options','decision'));
    }

    public function storeBinary(NewBinaryFactorRequest $request , Decision $decision){

        $this->authorize('isUserDecision',$decision);
        $this->authorize('isDecisionBinary',$decision);
        DB::transaction(function() use ($request,$decision){
            $factor = $decision->factors()->create(['title' => $request->title , 'weight' => $request->weight]);
            $score = Score::create(['option_id' => $request->option , "factor_id" => $factor->id , "score" => $request->score]);
        });
        return redirect()->route("decision.show" , $decision->id)->with("success" , "You added new Factor Successfully");
    }

    public function storeMulti(NewMultiFactorRequest $request , Decision $decision){
        
        $this->authorize('isUserDecision',$decision);
        $this->authorize('isDecisionMulti',$decision);

        DB::transaction(function() use ($request,$decision){
            $factor = $decision->factors()->create(['title' => $request->title , 'weight'=> $request->weight]);
            foreach($request->scores as $option => $score){
                Score::create(['score'=>$score , 'option_id' => $option , 'factor_id' => $factor->id]);
            }
        });
        
        return redirect()->route("decision.show", $decision->id)->with("success" , "You added new Factor Successfully !");

    }

    public function destroy(Decision $decision , Factor $factor)
    {
        $this->authorize('delete',$decision);
        if(!FacadesGate::allows('isFactorForDecision' , [$decision , $factor])){
            abort(403,'this factor is not for this decision !!');
        }

        $factor->delete();
        return redirect()->route("decision.show", $decision->id)->with('success' , " you deleted the factor successfully");
    }

    public function edit(Decision $decision , Factor $factor)
    {
        $this->authorize('isUserDecision',$decision);
        if(!FacadesGate::allows('isFactorForDecision' , [$decision , $factor])){
            abort(403,'this factor is not for this decision !!');
        }

        if($decision->type == DecisionType::BINARY){
            return view('binary.edit' , compact('decision', 'factor'));
        }
        if($decision->type == DecisionType::MULTI){
            return view('multi.edit' , compact('decision', 'factor'));
        }
        
    }

    public function updateBinary(Decision $decision , Factor $factor ,NewBinaryFactorRequest $request)
    {
        $this->authorize('isDecisionBinary',$decision);
        $this->authorize('isUserDecision',$decision);
        if(!FacadesGate::allows('isFactorForDecision' , [$decision , $factor])){
            abort(403,'this factor is not for this decision !!');
        }

        $factor->update((['title' => $request->title , 'weight' => $request->weight]));
        Score::query()->where('factor_id' , $factor->id)->update(['option_id' => $request->option , "score" => $request->score]);
        return redirect()->route("decision.show", $decision->id)->with('success' , "you edited the factor successfully");

        
    }

    public function updateMulti(Decision $decision , Factor $factor , NewMultiFactorRequest $request)
    {
        $this->authorize('isDecisionMulti',$decision);
        $this->authorize('isUserDecision',$decision);
        if(!FacadesGate::allows('isFactorForDecision' , [$decision , $factor])){
            abort(403,'this factor is not for this decision !!');
        }

        $factor->update((['title' => $request->title , 'weight' => $request->weight]));
        foreach($request->scores as $option => $score){
            $score = Score::query()->where('factor_id' , $factor->id)->where('option_id' , $option)->update(["score" => $request->score]);
        }
        return redirect()->route("decision.show", $decision->id)->with('success' , "you edited the factor successfully");
    }


}
