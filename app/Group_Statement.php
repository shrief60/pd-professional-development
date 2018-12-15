<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Group_Statement extends Model
{
    protected $fillable = ['first_lang_statement', 'second_lang_statement','objective_id','level_id','pre_requisite','require_points'];
    protected $table = "group_statements";
    //protected $timestamps =true;
    public function level(){
        return $this->belongsTo('App\Level', 'id');
    }
        
    public function objective(){
        return $this->belongsTo('App\Objective', 'id');
    }

    public function behaviors(){
        return $this->hasMany('App\Behavior'); 
    }

    public static function statementsInObjective($objective_id){

        $statement = DB::table('group_statements')->where('objective_id', $objective_id)->get();
            
            return $statement;
    }

    public static function exceptStatement($statement_id,$objective_id){

        $statements = DB::table('group_statements')->where('id','!=' ,$statement_id AND 'objective_id','=',$objective_id )->get();
            
            return $statements;
    }

    public static function getStatements(){

        $statements = DB::table('group_statements')->where('pre_requisite', '-1')->get();
            return $statements;
    }


    public static function getDependedStatements($statement_id){

        $statements = DB::table('group_statements')->where('pre_requisite', $statement_id)->get();
            return $statements;
    }
    
    public static function showFrameWork($teacher_id){

        $statements=DB::table('group_statements')->select('group_statements.*')->whereNotIn(DB::table('group_statements')
        ->join('tracks', 'tracks.statement_id', '=', 'group_statements.id')
        ->where('tracks.learner_id','=',$teacher_id)
        ->select('group_statements.*')
        ->get());
       
            return $statements;
    }
    
    public static function getObjectiveStatements($objective_id){

        $statements = DB::table('group_statements')->where('objective_id', $objective_id)->get();
            return $statements;
    }


}
