<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Objective extends Model
{
    protected $fillable = ['first_lang_objective', 'second_lang_objective','topic_id'];




    public function Topic(){
        return $this->belongsTo('App\Topic', 'id');
    }

    public static function objectiveInTopic($topic_id){

        $objective = DB::table('objectives')->where('topic_id', $topic_id)->get();
            return $objective;

    }
    public function GroupStatement(){
        return $this->hasMany('App\Group_Statement'); 
    }}
