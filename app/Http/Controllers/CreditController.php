<?php

namespace App\Http\Controllers;

use App\Credit;
use App\Evidence;
use App\Behavior;
use App\Progress;
use App\Track;
use App\Level;  
use App\Group_Statement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreditController extends Controller
{


      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($behavior_id,$teacher_id)
    {
        return view('credit.create',['behavior_id'=>$behavior_id,'teacher_id'=>$teacher_id]);

    }





    /*    store credit and its evidence , decrease number of credit's required 
    
    
    
    */
    public function store(Request $request,$progress_id,$for_id)
    {
        
        $progress=Progress::find($progress_id);
        $track=Track::find($progress->track_id);
        //dd($track);
        $behavior_id=$progress['behavior_id'];
        $levels=Behavior::AllInBehavior($behavior_id);
        $teacher_id= $track->learner_id;

       //return $levels[0]->self_weight;
       
        //has to upload at least one attachment
        if(!($request->hasFile('image')) && !($request->hasFile('video')) && !($request->hasFile('file'))) {
            return redirect()->back();
        }

        $learner = auth()->guard('learner')->user();
        $type = $learner->type;
        //dd($learner);
        $id = $learner->id;
        
        // store credit 
        $credit = new Credit;
        $credit->for_id = $for_id;
        $credit->from_id = $id;
        $credit->behavior_id=$behavior_id;
        
        //check type of credit
        if($type =='mentor'){
            $credit->credit_type ='2';
            if($progress['max_mentor']!='0'){
            $quantity= $levels[0]->mentor_weight;
            Progress::find($progress_id)->decrement('max_mentor',$quantity);
            Track::find($progress['track_id'])->decrement('rest_points',$quantity);

            //Progress::UpdateMentor($progress_id , $quantity);
            }
        }
        else {
            if($id==$for_id){
            $credit->credit_type='0';

            if($progress['max_self']!='0'){
            $quantity=$levels[0]->self_weight;
            Progress::find($progress_id)->decrement('max_self',$quantity);
            Track::find($progress['track_id'])->decrement('rest_points',$quantity);

            }
        }
            else{
                $credit->credit_type='1';
                if($progress['max_peer']!='0'){
                    $quantity=$levels[0]->peer_weight;
                    Progress::find($progress_id)->decrement('max_peer',$quantity);
                    Track::find($progress['track_id'])->decrement('rest_points',$quantity);

                    }
            
            }
        }
        $credit->save();
        $credit_id= $credit->id;

       //echo $track['rest_points'];

        

        if($request->hasFile('image')) {

            $evidence = new Evidence;
            $evidence->for_id=$for_id;
            $evidence->link= $request->file('image')->store('/evidence/image','public');
            $evidence->type='image';
            $evidence->description=$request->imageDescreption;
            $evidence->credit_id=$credit_id;
            $evidence->save();
        }

        if($request->hasFile('video')) {

            $evidence = new Evidence;
            $evidence->for_id=$for_id;
            $evidence->link=$request->file('video')->store('/evidence/video','public');
            $evidence->type='video';
            $evidence->description=$request->videoDescreption;
            $evidence->credit_id=$credit_id;
            $evidence->save();
        }

        if($request->hasFile('pdf')) {

            $evidence = new Evidence;
            $evidence->for_id=$for_id;
            $evidence->link=$request->file('pdf')->store('/evidence/pdf','public');
            $evidence->type='pdf';
            $evidence->description=$request->pdfDescreption;
            $evidence->credit_id=$credit_id;
            $evidence->save();
            }

            if($track['rest_points']<=0){
                //ToDo /* check if this behavior from two weeks*/ 
                Track::UpdateAchived($track['id']);

                $statemens=Group_Statement::getDependedStatements($track->statement_id);
                //dd($statemens);
                $tracks=array();
                foreach($statemens as $value){ 
                    $tracks =[
                        'learner_id' => $teacher_id,
                        'statement_id' => $value->id,
                        'opened'=>'1',
                        'achieved'=> '0',
                        'rest_points'=>$value->require_points
                       ]; 
                       Track::create($tracks);
                } 
            }

            return redirect()->route('progress.index',[$teacher_id]);

    }

    /**
     * Display a listing of the levels.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($teacher_id)
    {
        //$credits=Credit::allCredits($teacher_id);
        $credit=new Credit;
        $credits=$credit->learner();
        dd($credits);
        return view('credit.show',['credits'=>$credits]);
    }





}
