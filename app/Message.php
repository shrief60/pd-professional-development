<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function from() {
        $this->belongsTo(User::class);
    }

    public function to() {
        $this->hasMany(User::class);
    }

    
}
