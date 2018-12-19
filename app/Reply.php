<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    public function learner()
    {
        return $this->belongsTo(Learner::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

}
