<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Znck\Eloquent\Traits\BelongsToThrough;

class Lesson extends Model
{

    use Sluggable, BelongsToThrough;

    protected $guarded = [];

    /*************************************************************************/
    /*                              Relations                                */
    /*************************************************************************/
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function course()
    {
        return $this->belongsToThrough(Course::class, Unit::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function questions()
    {
        return $this->morphMany(Question::class, 'questionable');
    }

    public function learners()
    {
        return $this->belongsToMany(Learner::class);
    }

    /*************************************************************************/
    /*                              Accessors                                */
    /*************************************************************************/
    public function getPathAttribute($path)
    {
        return asset("/storage/{$path}");
    }
    public function getPosterAttribute($poster)
    {
        return asset("/storage/{$poster}");
    }
    public function getIsVideoAttribute()
    {
        return $this->type === 'video';
    }

    public function getIsReadingAttribute()
    {
        return $this->type === 'reading';
    }

    public function getIsPracticeAttribute()
    {
        return $this->type === 'practice';
    }

    /*************************************************************************/
    /*                          Route Model Binding                          */
    /*************************************************************************/
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /*************************************************************************/
    /*                          Slug                                         */
    /*************************************************************************/
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

}
