<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $guarded = [];

    /**
     * Relations
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    /**
     * Relations
     */

    /**
     * Accessors
     */
    public function getPathAttribute($path)
    {
        return asset("/storage/{$path}");
    }

}
