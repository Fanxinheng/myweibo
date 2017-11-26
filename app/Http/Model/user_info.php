<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{
    public $table = 'user_info';
	public $timestamps = false;

    protected $fillable = ['id','nickName','sex','age','work','email','photo','socre'];

    //用户信息
    public function user()
    {
        return $this->belongsTo('App\Http\user','id');
    }

	//用户发帖的信息
    public function contents()
    {
    	return $this->hasOne('App\Http\Model\contents','uid','uid');
    }

}
