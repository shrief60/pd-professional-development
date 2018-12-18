<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class progress extends Model
{
    protected $fillable = [ 'learner_id','statement_id','track_id','behavior_id','max_self','max_peer','max_mentor'];

    public function Learner(){
        return $this->belongsTo('App\Learner', 'id');
    }


    public function GroupStatment(){
        return $this->belongsTo('App\Group_Statment', 'id');
    }

    public function Behavior(){
        return $this->belongsTo('App\Behavior', 'id');
    }



    public static function InProgress($teacher_id){
        $progress= DB::table('progresses')
        ->join('behaviors', 'behaviors.id', '=', 'progresses.behavior_id')
        ->where('learner_id', $teacher_id)
        ->select('behaviors.first_lang_behavior','behaviors.second_lang_behavior','behaviors.id','progresses.max_self','progresses.max_peer','progresses.max_mentor','progresses.learner_id','progresses.id As progress_id')
        ->get();
        return $progress;
    }
/*

    public static function UpdateSelf($progress_id,$quantity){
        DB::table('progresses')
        ->where('id', $progress_id)
        ->update(['max_self' => $quantity]);
    }
    
    public static function UpdatePeer($progress_id){
        DB::table('progresses')
        ->where('id', $progress_id)
        ->update(['max_peer' => $quantity]);

    }
    
    public static function UpdateMentor($progress_id){
        DB::table('progresses')
        ->where('id', $progress_id)
        ->update(['max_mentor' => -$quantity]);
    }*/
    

}
