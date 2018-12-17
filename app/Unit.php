<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Unit extends Model
{

    use Sluggable;

    protected $guarded = [];

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->oldest('order');
    }

    public function lessonsReverse()
    {
        return $this->hasMany(Lesson::class)->latest('order');
    }

    public function questions()
    {
        return $this->morphMany(Question::class, 'questionable');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /*************************************************************************/
    /*                          Route Model Binding                          */
    /*************************************************************************/
    public function getRouteKeyName()
    {
        return 'slug';
    }


    /**
     * Get the options for generating the slug.
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];

    }

    public function lessonsOrder()
    {
        $lastLesson = $this->lessonsReverse()->select('order')->latest('order')->first();

        return $lastLesson ? $lastLesson->order++ : 1;
    }


}
