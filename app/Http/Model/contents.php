<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class contents extends Model
{
    public $table = 'contents';

    public function replay()
    {
    	return $this->hasMany('App\Http\Model\replay','uid','uid');
    }

   //  public function user_info()
   // {
   // 		return $this->hasOne('App\Http\Model\user_info','uid','uid');
   // }
}
