<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorProfile extends Model
{

    protected $guarded = [];

    public function mentor()
    {
        return $this->belongsTo(Learner::class);
    }
}
