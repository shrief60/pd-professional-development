<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    use Sluggable;

    protected $guarded = [];

    /*************************************************************************/
    /*                          Relations                                    */
    /*************************************************************************/
    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Unit::class);
    }

    public function learner()
    {
        return $this->belongsToMany(User::class);
    }

    /*************************************************************************/
    /*                          Route Model Binding                          */
    /*************************************************************************/
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*************************************************************************/
    /*                               Slug                                    */
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
    /*                              Accessors                                */
    /*************************************************************************/
    public function getImageAttribute($image)
    {
        return asset("storage/$image");
    }

    public function progress()
    {
        return round($this->finishedUnits() / $this->units()->count() * 100);
    }

    /*************************************************************************/
    /*                         Methods                                       */
    /*************************************************************************/
    public function finishedUnits()
    {
        return LearnerUnit::finishedUnits($this->units()->select('id')->get());
    }
}
