<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    protected $table = 'evidences';
    protected $fillable = [ 'for_id','name','link','type','description','credit_id'];
    
    public function credit(){
        return $this->belongsTo('App\Credit', 'id');
    }

    public function learner() {
        return $this->belongsTo(Learner::class, 'for_id');
    }
}
