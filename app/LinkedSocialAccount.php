<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkedSocialAccount extends Model
{

    protected $guarded = [];

    public function accountable()
    {
        return $this->morphTo();
    }
}
