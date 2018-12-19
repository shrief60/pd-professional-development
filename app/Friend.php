<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Friend extends Model
{


    protected $fillable = [ 'learner_id','friend_id'];

/*     public function users()
    {
        return $this->belongsToMany('App\User');
    } */

    public static function getFriends($teacher_id){
    
        /*$friends = DB::table('friends')
        ->select('friends.friend_id')
        ->where('learner_id', $teacher_id)
        ->get();*/

        $friends = self::where('learner_id',$teacher_id)->get();
        return $friends;

    }

}
