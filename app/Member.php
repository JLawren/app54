<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    //
    protected $table = 'members';
    public $timestamps = true;

    public function attends(){
    	return $this->hasMany('App\Attend','member_id');
    }
}
