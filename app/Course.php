<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'desciption', 'educator_id',
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::Class);
    }

    public function educator()
    {
        return $this->belongsTo(Educator::class);
    }


}
