<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    // (Post or Lesson)
    public function commentable() 
    {
        return $this->morphTo();
    }

    // (Student, Mentor, or Educator)
    public function owner() 
    {
        return $this->morphTo();
    }
}
