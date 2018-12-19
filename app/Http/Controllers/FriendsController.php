<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	use DB;
	use App\Friend;
  use App\Learner;
  use Response;
  use Auth;
class FriendsController extends Controller
{
  public static function viewpage(){

    return view('friends.view');
  }
  public static function friendadd(Request $request){
    $id=Auth::guard('learner')->id();
  						$add=DB::table('friends')->insert(	[     
                  'learner_id'=> $id,
  		 								'friend_id'=>$request->friend_id	
 							 		]);
  									return Response::json($add);
  }
  public static function checkfriend(Request $request){
    $search=$request->search;
    
    
     $checkfriend=DB::table('learners')->where('username',$search)->get();
    if($checkfriend==$search){
      
    }
return $checkfriend;

  }
  public static function friendlist(Request $request){
    $id=Auth::guard('learner')->id();
  						$lists=Friend::where('learner_id',$id)
                                ->orwhere('friend_id',$id)->get();
      
                 $myfriends[]=array();
                   for($i=0;$i<count($lists);$i++){
                if($lists[$i]['friend_id']==$id){
                
                                      $myfriends[]=Learner::where('id',$lists[$i]['learner_id'])->get();
                                        }else{
           $myfriends[]=Learner::where('id',$lists[$i]['friend_id'])->get();
               }
     }
     return   $myfriends;
   }
   public static function friendlists( $id){

              $lists=Friend::where('learner_id',$id)->get();             
                   for($i=0;$i<count($lists);$i++){      
                $myfriends[]=Learner::where('id',$lists[$i]['friend_id'])->get();;

           
               
     }
     return view('friends.friendlist')->with('myfriends',$myfriends);
   }
  public static function frienddelete(Request $request){
     $id=Auth::guard('learner')->id();
  						$delete=DB::table('friends')
  								->where(['learner_id'=> $id,
  										      'friend_id'=>$request->friend_id])->delete();
  	 
      return $delete;
  }
  public static function usersearch(Request $request){
      $dataTOsearch=$request->searched;
      $seausers=Learner::where('username',$dataTOsearch)->get();
        
        return $seausers;
    // else{
    // }
  }
 
 }
