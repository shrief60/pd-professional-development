<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function learner()
    {
        return $this->belongsTo(Learner::class);
    }
}
