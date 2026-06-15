<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewOptionsRequest;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewOptionsRequest $request)
    {
        if(!session()->has("decisionData")){
            return redirect()->route('decision.create');
        }
        $user = Auth::user();

        $decision = DB::transaction(function () use ($user , $request,){
            $decision = $user->decisions()->create(session()->get('decisionData'));
            foreach ($request->options as $option) {
            $decision->options()->create(["title" => $option]);
            }
            return $decision;
        });
        

        session()->forget('decisionData');

        return redirect()->route('decision.show' , $decision->id)->with("success" , "Decision {$decision->title} added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        //
    }
}
