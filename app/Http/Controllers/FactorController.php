<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBinaryFactor;
use App\Http\Requests\NewBinaryFactorRequest;
use App\Http\Requests\NewMultiFactorRequest;
use App\Models\Decision;
use App\Models\Factor;
use App\Models\Option;
use App\Models\Score;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    public function createBinary(Decision $decision){

        $this->authorize('isUserDecision',$decision);
        $this->authorize('isDecisionBinary',$decision);

        $options = $decision->options()->latest()->get();
        return view('binary.newfactor' , compact('options'));
    }

    public function createMulti(Decision $decision){

        $this->authorize('isUserDecision',$decision);
        $this->authorize('isDecisionMulti',$decision);
        $options = $decision->options()->latest()->get();
        return view('multi.newfactor', compact('options'));
    }

    public function storeBinary(NewBinaryFactorRequest $request , Decision $decision){

        $this->authorize('isUserDecision',$decision);
        $this->authorize('isDecisionBinary',$decision);

        $factor = $decision->factors()->create(['title' => $request->title , 'weight' => $request->weight]);
        $score = Score::create(['option_id' => $request->option , "factor_id" => $factor->id , "score" => $request->score]);
        return redirect()->route("decision.show" , $decision->id)->with("success" , "You added new Factor Successfully");
    }
    public function storeMulti(NewMultiFactorRequest $request , Decision $decision){
        $this->authorize('isUserDecision',$decision);
        $this->authorize('isDecisionMulti',$decision);

        $factor = $decision->factors()->create(['title' => $request->title , 'weight'=> $request->weight]);
        foreach($request->scores as $option => $score){
            Score::create(['score'=>$score , 'option_id' => $option , 'factor_id' => $factor->id]);
        }
        return redirect()->route("decision.show", $decision->id)->with("success" , "You added new Factor Successfully !");

    }

}
