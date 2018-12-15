<?php

namespace App\Http\Controllers\Learner;
use App\Behavior;
use App\Progress;
use App\Track;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgressController extends Controller
{

    public function index($teacher_id)
    {
        $progress=Progress::AllStatementsInTrack($teacher_id);

        return view('progress.index',['progress'=>$progress]);
    }

    public function store($track_id,$statement_id,$teacher_id)
    {
        $behaviors=Behavior::behaviorsInStatement();
        $progress=array();
        foreach($behaviors as $value){ 
            $progress =[
                'learner_id' => $teacher_id,
                'statement_id' => $value->id,
               // 'behavior_id'=> $value->
                'opened'=>'1',
                'achieved'=> '0'
               ]; 
               Track::create($progress);
        } 
        Track::UpdateWorkOn($id);
        return redirect()->route('progresses.index',[]);
    }


}
