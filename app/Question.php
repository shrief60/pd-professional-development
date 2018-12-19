<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $guarded = [];
    protected $hidden = ['correct_answer_id'];

    /*************************************************************************/
    /*                          Relations                                    */
    /*************************************************************************/
    public function questionable()
    {
        return $this->morphTo();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function learners()
    {
        return $this->belongsToMany(Learner::class);
    }

    /*************************************************************************/
    /*                             Accessors                                 */
    /*************************************************************************/
    public function getIsMCQAttribute()
    {
        return $this->type === 'mcq';
    }

    /*************************************************************************/
    /*                             Methods                                   */
    /*************************************************************************/
    public function learnerCanAnswer()
    {
        return !$this->learners()->wherePivot('learner_id', auth()->id())->exists();
    }

}
