<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function lesson(){
        return $this->hasOne(Lesson::class);
    }
    
    public function course(){
        return $this->belongsTo(Course::class);
    }
    
}
