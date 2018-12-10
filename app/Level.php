<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['first_lang_level_name', 'second_lang_level_name','self_weight','peer_weight','mentor_weight'];}
