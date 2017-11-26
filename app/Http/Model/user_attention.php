<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user_attention extends Model
{
    public $table = 'user_attention';

    protected $fillable = ['id','gid','uid'];

    public $timestamps = false;

     
    public function user_info(){

    	return $this->hasOne('App\Http\Model\user_info','uid','gid');
    }

    public function contents()
    {
        return $this->hasMany('App\Http\Model\contents','uid','gid');
    }

}
