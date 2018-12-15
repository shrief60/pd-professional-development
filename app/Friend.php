<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{


    protected $fillable = [ 'learner_id','friend_id'];


    public static function getFriends($teacher_id){
    
        $friends = DB::table('friends')->where('friend_id', $teacher_id)->get();
        return $friends;

    }

}
