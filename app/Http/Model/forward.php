<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class forward extends Model
{
    public $table = 'forward';

    public $timestamps = false;

    protected $fillable = ['id','uid','tid','pid','content','time','status'];

    public function user_info()
   {
   	return $this->hasOne('App\Http\Model\user_info','uid','fid');
   }

   public function contents()
   {
   	return $this->hasMany('App\Http\Model\contents','cid','tid');
   }

}
