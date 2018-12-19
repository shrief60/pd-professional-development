<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];
    // (Post or Lesson)
    public function commentable()
    {
        return $this->morphTo();
    }

    // (Student, Mentor, or Educator)
    public function learner()
    {
        return $this->belongsTo(Learner::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
