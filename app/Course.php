<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    public function units() 
    {
        return $this->hasMany(Unit::class);
    }
    
    public function students() 
    {
        return $this->belongsToMany(Student::Class);
    }

    public function educator() 
    {
        return $this->belongsTo(Educator::class);
    }


}
