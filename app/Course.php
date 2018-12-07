<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Course extends Model
{

    use Sluggable;

    protected $guarded = [];

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

    public function educator()
    {
        return $this->belongsTo(Educator::class);
    }

    /*************************************************************************/
    /*                          Route Model Binding                          */
    /*************************************************************************/
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }


    public function getImageAttribute($image) {
        return asset("storage/$image");
    }

}
