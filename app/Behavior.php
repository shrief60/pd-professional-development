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

        $behaviors = DB::table('behaviors')->where('id', $statement_id)->get();
            return $behaviors;
    }

}
