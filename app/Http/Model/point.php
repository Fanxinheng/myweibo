<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class point extends Model
{
    public $table = 'point';



    protected $fillable = ['id','uid','tid','pid','time','status'];

    public $timestamps = false;

    public function content()
    {
    	return $this->hasMany('App\Http\Model\contents', 'cid', 'tid');
    }

    public function users()
    {
    	return $this->hasOne('App\Http\Model\user_info','uid','uid');
    }

    public function user_info()
    {
    	return $this->hasOne('App\Http\Model\user_info','uid','pid');
    }

}
