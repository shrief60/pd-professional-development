<?php

namespace App\Http\Controllers;
use App\Behavior;
use App\Progress;
use App\Track;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgressController extends Controller
{

    public function index($teacher_id)
    {
       $progress=Progress::InProgress($teacher_id);
      // dd($progress);
       return view('progress.index',['progress'=>$progress]);
    }

    public function store($id,$statement_id,$teacher_id)
    {
            //return $statement_id; 
        $behaviors=Behavior::behaviorsInStatementM($statement_id);
        //($behaviors);
        $progress=array();
        foreach($behaviors as $value){
            $progress =[
                'learner_id' => $teacher_id,
                'track_id' => $id,
                'statement_id' => $value->statement_id,
                'behavior_id'=> $value->id,
                'max_self'=>($value->max_self*$value->self_weight),
                'max_peer'=>($value->max_peer*$value->peer_weight),
                'max_mentor'=>($value->max_mentor*$value->mentor_weight)    
            ];
               Progress::create($progress);
        }

        Track::UpdateWorkOn($id);
        return redirect()->route('progress.index',[$teacher_id]);
    }


}
