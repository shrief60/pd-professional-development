<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the levels.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $levels=Level::all();
        //return response()->json($data); 
        return view('level.index',['levels'=>$levels]);
    }

    /**
     * Show the form for creating a new level.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('level.create');
    }

    /**
     * Store a newly created level in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_lang_level_name'=>'required',
            'second_lang_level_name'=>'required',
            'self_weight'=> 'required',
            'peer_weight'=> 'required',
            'mentor_weight'=> 'required'
             
        ]);
        Level::create($request->all());
        return redirect()->route('levels.index');  
    }


    /**
     * Show the form for editing the specified level.
     *
     * @param  int  $level_id
     * @return \Illuminate\Http\Response
     */
    public function edit($level_id)
    {
        $level=Level::find($level_id);
        return view('level.edit',['level'=>$level]);
    }

    /**
     * Update the specified level in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $level_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $level_id)
    {
        $this->validate($request,[
            'first_lang_level_name'=>'required',
            'second_lang_level_name'=>'required',
            'self_weight'=> 'required',
            'peer_weight'=> 'required',
            'mentor_weight'=> 'required'
            

        ]);
        $level=Level::find($level_id);
        $level->update($request->all());
        return redirect()->route('levels.index');
    }

    /**
     * Remove the specified level from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($level_id)
    {
        
        Level::find($level_id)->delete();
        return redirect()->route('levels.index')->with('success', 'level has been deleted!!');

    }
}
