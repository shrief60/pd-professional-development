<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $guarded = [];
    protected $hidden = ['correct_answer_id'];

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
