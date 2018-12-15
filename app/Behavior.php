<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Behavior extends Model
{
    protected $fillable = ['first_lang_behavior', 'second_lang_behavior','statement_id','max_self','max_peer','max_mentor'];
    
    public function GroupStatment(){
        return $this->belongsTo('App\Group_Statment', 'id');
    }


    public static function behaviorsInStatement($statement_id){

        $behaviors = DB::table('behaviors')->where('statement_id', $statement_id)->get();
            return $behaviors;
    }

    public static function behaviorsInStatementM($statement_id){
        $behaviors = DB::table('group_statements')
        ->join('behaviors', 'group_statements.id', '=', 'behaviors.statement_id')
        ->join('levels', 'levels.id', '=', 'group_statements.level_id')
        ->where('behaviors.statement_id','=',$statement_id)
        ->select('behaviors.*','levels.self_weight','levels.peer_weight','levels.mentor_weight')
        ->get();

        return $behaviors;
    }




    public static function AllInBehavior($behavior_id){
        $levels= DB::table('group_statements')
        ->join('behaviors', 'behaviors.statement_id', '=', 'group_statements.id')
        ->join('levels', 'levels.id', '=', 'group_statements.level_id')
        ->where('behaviors.id', $behavior_id)
        ->select('levels.self_weight','levels.peer_weight','levels.mentor_weight','group_statements.id AS statement_id')
        ->get();
        return $levels;
    }

}
