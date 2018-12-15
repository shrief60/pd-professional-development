<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objective ;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource
     *      * @param  int  $topic_id

     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objectives=Objective::all();
        return view('objective.index',['objectives'=>$objectives ]);
    }

    /**
     * Display a listing of the resource
     *      * @param  int  $topic_id

     *
     * @return \Illuminate\Http\Response
     */
    public function show($topic_id)
    {
        $objectives=Objective::objectiveInTopic($topic_id);
        return view('objective.show',['objectives'=>$objectives , 'topic_id'=>$topic_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($topic_id)
    {
        return view('objective.create',['topic_id'=>$topic_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$topic_id)
    {
        $this->validate($request,[
            'first_lang_objective'=>'required',
            'second_lang_objective'=>'required',
            'topic_id'=>'required'

        ]);
        Objective::create($request->all());
        return redirect()->route('objectives.show',['topic_id'=>$topic_id]);  

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($objective_id)
    {
        $objective=Objective::find($objective_id);
        return view('objective.edit',['objective'=>$objective]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $objective_id,$topic_id)
    {
        $this->validate($request,[
            'first_lang_objective'=>'required',
            'second_lang_objective'=>'required',
            'topic_id'=>'required'

        ]);

        $objective=Objective::find($objective_id);
        $objective->update($request->all());
        return redirect()->route('objectives.show',['topic_id'=>$topic_id]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $topic_id
     * @param  int  $objective_id
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($topic_id,$objective_id)
    {
        Objective::find($objective_id)->delete();
        return redirect()->route('objectives.show',$topic_id)->with('success', 'level has been deleted!!');
    }
}
