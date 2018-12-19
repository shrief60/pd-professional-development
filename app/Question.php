<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $guarded = [];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

}
