<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    protected $table = 'evidences';

    public function credit()
    {
        return $this->belongsTo(Credit::class, 'id');
    }

    public function learner()
    {
        return $this->belongsTo(Learner::class, 'for_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
