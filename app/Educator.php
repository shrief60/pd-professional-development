<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Educator extends Authenticatable
{
    use Notifiable;   
     
    public function courses() 
    {
        return $this->hasMany(Course::class);
    }

    public function posts() {
        return $this->morphTo(Post::class, 'owner');
    }

    public function comments() {
        return $this->morphTo(Comment::class, 'owner');
    }

    public function replies() {
        return $this->morphTo(Reply::class, 'owner');
    }
}
