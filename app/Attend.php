<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attend extends Model
{
    //
    protected $table = 'attends';
    public $timestamps = true;

    public function member(){
    	return $this->belongsTo('App\Member','member_id');
    }
}
