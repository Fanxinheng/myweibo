<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class replay extends Model
{
    public $table = 'replay';

   public function user_info()
   {
   	return $this->hasOne('App\Http\Model\user_info','uid','rid');
   }

   public function content()
   {
   	return $this->hasMany('App\Http\Model\contents','cid','tid');
   }
}
