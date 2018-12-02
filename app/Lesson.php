<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    
    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function students() {
        return $this->belongsToMany(Student::class);
    }
}
