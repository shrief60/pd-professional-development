<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Track extends Model
{
    protected $fillable = [ 'learner_id','statement_id','opened','achieved','worked','rest_points'];
    
    public function Learner(){
        return $this->belongsTo('App\Learner', 'id');
    }

    
     
    public function GroupStatment(){
        return $this->belongsTo('App\Group_Statment', 'id');
    }
    
    public static function AllStatementsInTrack($teacher_id){

        $statements= DB::table('group_statements')
        ->join('tracks', 'tracks.statement_id', '=', 'group_statements.id')
        ->where('tracks.learner_id','=',$teacher_id)
        ->select('group_statements.*','group_statements.id AS statement_id','tracks.*')
        ->get();
        return $statements;
    }
   

    public static function UpdateWorkOn($track_id){
        DB::table('tracks')
        ->where('id', $track_id)
        ->update(['worked' => 1]);
        }
    
    public static function UpdateAchived($track_id){
        DB::table('tracks')
        ->where('id', $track_id)
        ->update(['achieved' => 1]);
        }
    
}
