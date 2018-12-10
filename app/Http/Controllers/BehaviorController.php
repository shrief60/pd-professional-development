<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Behavior;

class BehaviorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($statement_id)
    {

        $behaviors=Behavior::behaviorsInStatement($statement_id);
        return view('behavior.index',['behaviors'=>$behaviors , 'statement_id'=>$statement_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($statement_id)
    {
        return view('behavior.create',['statement_id'=>$statement_id]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$statement_id)
    {
        
        //dd($request);
        
        $this->validate($request,[
            'first_lang_behavior'=>'required',
            'second_lang_behavior'=>'required',
            'statement_id'=>'required',
            'max_self' => 'required',
            'max_peer' => 'required',
            'max_mentor' => 'required'
        ]);
        Behavior::create($request->all());
        return redirect()->route('behaviors.index',['statement_id'=>$statement_id]);  
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($behavior_id)
    {
        
        $behavior=Behavior::find($behavior_id);
        return view('behavior.edit',['behavior'=>$behavior]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $behavior_id,$statement_id)
    {
        $this->validate($request,[
            'first_lang_behavior'=>'required',
            'second_lang_behavior'=>'required',
            'statement_id'=>'required',
            'max_self' => 'required',
            'max_peer' => 'required',
            'max_mentor' => 'required'

        ]);

        $behavior=Behavior::find($behavior_id);
        $behavior->update($request->all());
        return redirect()->route('behaviors.index',['statement_id'=>$statement_id]);  
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $statement_id, $id )
    {

        $beh = Behavior::findOrFail($id);
        $beh->delete();
        return redirect()->route('behaviors.index',$statement_id)->with('success', 'behavior has been deleted!!');
    }
}
