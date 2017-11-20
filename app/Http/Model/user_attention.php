<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user_attention extends Model
{
    public $table = 'user_attention';

     
    public function info(){

    	return $this->hasOne('App\Http\Model\user_info','uid','gid');
    }

   
}
