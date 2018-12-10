<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Track extends Model
{
    protected $fillable = [ 'learner_id','statement_id','opened','achieved'];
    
    public function Learner(){
        return $this->belongsTo('App\Learner', 'id');
    }

    
     
    public function GroupStatment(){
        return $this->belongsTo('App\GroupStatment', 'id');
    }






}
