<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Group_Statement extends Model
{
    protected $fillable = ['first_lang_statement', 'second_lang_statement','objective_id','level_id','pre_requisite','require_points'];
    protected $table = "group_statements";
    //protected $timestamps =true;
    public function Level(){
        return $this->belongsTo('App\Level', 'id');
    }

    
    public function Objective(){
        return $this->belongsTo('App\Objective', 'id');
    }

    public function Behavior(){
        return $this->hasMany('App\Behavior'); 
    }

    public static function statementsInObjective($objective_id){

        $statement = DB::table('group_statements')->where('objective_id', $objective_id)->get();
            
            return $statement;
    }

    public static function exceptStatement($statement_id){

        $statements = DB::table('group_statements')->where('id','!=' ,$statement_id)->get();
            
            return $statements;
    }
}
