<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{


    use Sluggable;

    protected $guarded = [];

    /*************************************************************************/
    /*                          Relations                                    */
    /*************************************************************************/
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function learners()
    {
        return $this->belongsToMany(Learner::class);
    }

    /*************************************************************************/
    /*                          Route Model Binding                          */
    /*************************************************************************/
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*************************************************************************/
    /*                         Slug                                          */
    /*************************************************************************/
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }



    /*************************************************************************/
    /*                         Methods                                       */
    /*************************************************************************/
    public function lessonsOrder()
    {
        $lastLesson = $this->lessonsReverse()->select('order')->latest('order')->first();

        return $lastLesson ? $lastLesson->order++ : 1;
    }

    public function isFinished()
    {
        return LearnerUnit::isUnitFinished($this->id);
    }

    public function statusIcon()
    {
        return $this->isFinished() ? 'unlock' : 'lock';
    }

}
