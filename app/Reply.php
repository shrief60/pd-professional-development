<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    
    public function owner() {
        return $this->morphTo();
    }

    public function comment(){
        return $this->belongsTo(Comment::class);
    }

}
