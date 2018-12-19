<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{

    protected $guarded = [];

    public function learner()
    {
        return $this->belongsTo(Learner::class);
    }

    public function getLevelsAttribute($levels)
    {
        return explode(',', $levels);
    }

    public function getSubjectsAttribute($subjects)
    {
        return explode(',', $subjects);
    }
}
