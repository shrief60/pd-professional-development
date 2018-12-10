<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['first_lang_major_name', 'second_lang_major_name','first_lang_desc','second_lang_desc'];


    public function objectives(){
        return $this->hasMany('App\Objective'); 
    }


}
