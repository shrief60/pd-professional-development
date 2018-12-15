<?php

namespace App\Http\Controllers\Learner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreditController extends Controller
{


      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('credit.create');

    }

    public function store($id)
    {

        echo "hi";
        /*
        $user=Auth::user();
        if()
        $behaviors=Behavior::behaviorsInStatementM($statement_id);
       //dd($behaviors);

        $progress=array();
        foreach($behaviors as $value){
            $progress =[
                'learner_id' => $teacher_id,
                'statement_id' => $value->statement_id,
               'behavior_id'=> $value->id,
                'max_points'=>($value->max_self*$value->self_weight)+($value->max_peer*$value->peer_weight)+($value->max_mentor*$value->mentor_weight)
               ];
               Progress::create($progress);
        }

        Track::UpdateWorkOn($id);
        return redirect()->route('progress.index',[$teacher_id]);*/
    }





}
