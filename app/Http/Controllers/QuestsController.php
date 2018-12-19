<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quest;
use App\Friend;
use Response;
use App\Learner;
use DB;
use Auth;

class QuestsController extends Controller
{
    
  public static function addquest(Request $request){
  	$id=Auth::guard('learner')->id();
    $addreq=DB::table('quests')->insert([
                                  'learner_id'=>$id,
                                  'friend_id'=>$request->friend_id
                                        ]);
    return Response::json($addreq);
  }
  public static function checkquest(Request $request){
    $id=Auth::guard('learner')->id();
    $checkreq=DB::table('quests')->where([
                                   'learner_id'=>$id,
                                   'friend_id'=>$request->friend_id
                                        ])->get();
    return $checkreq;
  }

 public static function listquest(Request $request){
              $id=Auth::guard('learner')->id();
              $lists=Quest::where('friend_id',$id)->get();
      
                 $myquests[]=array();
                   for($i=0;$i<count($lists);$i++){
                
                $myquests[]=Learner::where('id',$lists[$i]['learner_id'])->get();;

           
               
     }
     return   $myquests;
   }



  public static function listquests(Request $request){
    $id=Auth::guard('learner')->id();
    $listreqs=Quest::where('friend_id',$id)->get();
    $userlists=array();
        if(count($listreqs)==0){
      $message="لايوجد طلبات صداقة";
       return view('quests.listquest')->with('message',$message);

    }else{
      for($i=0;$i<count($listreqs);$i++){
    $userlists[]=Learner::where('id',$listreqs[$i]['learner_id'])->get();
}

       if(request()->ajax()) {
                 return Response::json($userlists);
    }
  }
               return view('quests.listquest')->with('userlists',$userlists);
                                      
  }
  public static function deletequest(Request $request){
       $id=Auth::guard('learner')->id();
    $deletereq=Quest::where([
                            'learner_id'=>$request->friend_id,
                           'friend_id'=>$id
                          ])
                      ->orwhere([
                            'learner_id'=>$id,
                           'friend_id'=>$request->friend_id
                          ]

                      )->delete();
                          return $deletereq;
;
  }

 }
