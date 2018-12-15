<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group_Statement;
use App\Level;
use Validator;



class GroupStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($objective_id)
    {
        $statements=Group_Statement::statementsInObjective($objective_id);
        if (!isset($statements)){
            $statements=[];
        }
        return view('statement.index',['statements'=>$statements , 'objective_id'=>$objective_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($objective_id)
    {
        $statements=Group_Statement::all();
        $levels=Level::all();
        return view('statement.create',['objective_id'=>$objective_id,'levels'=>$levels ,'statements'=>$statements ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$objective_id)
    {
        $validator = Validator::make($request->all(), [
            'first_lang_statement'=>'required',
            'second_lang_statement'=>'required',
            'objective_id'=>'required',
            'level_id'=>'required',
            'pre_requisite'=>'required',
            'require_points'=>'required'
        ]);

       
        Group_Statement::create($request->all());
        return redirect()->route('statements.index',['objective_id'=>$objective_id]);  

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $statement_id
     * @return \Illuminate\Http\Response
     */
    public function edit($statement_id)
    {    
        $statement=Group_Statement::find($statement_id);
        if( $statement['pre_requisite']!=-1){
            $statements=Group_Statement::exceptStatement($statement_id);
        }
        else {
            $statements=Group_Statement::all();   
        }

        $levels=Level::all();
        return view('statement.edit',['statements'=>$statements,'statement'=>$statement,'levels'=>$levels]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $objective_id,$statement_id)
    {
        
        //dd($request);
        
        $test=$this->validate($request,[
           
            'first_lang_statement'=>'required',
            'second_lang_statement'=>'required',
            'objective_id'=>'required',
            'level_id'=>'required',
            'pre_requisite'=>'required',
            'require_points'=>'required'

        ]);

        $statement=Group_Statement::find($statement_id);
        $statement->update($request->all());
        return redirect()->route('statements.index',['objective_id'=>$objective_id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($objective_id,$statement_id)
    {
        Group_Statement::find($statement_id)->delete();
        
        return redirect()->route('statements.index',$objective_id)->with('success', 'statement has been deleted!!');
    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function framework($teacher_id)
    {
        $tracks=Track::AllStatementsInTrack($teacher_id);
        $statements=Group_Statement::showFrameWork($teacher_id);
        dd($statements);
        //return view('statement.framework',['statements'=>$statements ,'tracks'=>$tracks ,'teacher_id'=>$teacher_id]);
    }
}
