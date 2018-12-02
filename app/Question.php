<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{


    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

    public function answers() {
        return $this->hasMany(User::class);
    }

    public function students() {
        return $this->belongsToMany(Student::class);
    }

}

