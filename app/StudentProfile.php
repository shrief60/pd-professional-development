<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{

    protected $guarded = [];

    public function learner()
    {
        return $this->belongsTo(Learner::class);
    }
}
