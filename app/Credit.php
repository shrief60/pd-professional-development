<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Credit extends Model
{
    protected $fillable = [ 'for_id','from_id','behavior_id','credit_type'];

    public function learner(){
        return $this->belongsTo('App\Learner', 'id');
    }


    public function behavior(){
        return $this->belongsTo('App\Behavior', 'id');
    }
}
