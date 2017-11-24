<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{
    public $table = 'user_info';
	public $timestamps = false;

    protected $fillable = ['id','nickName','sex','age','work','email','photo','socre'];

    

    public function user()
    {
        return $this->belongsTo('App\Http\user','id');
    }
}
