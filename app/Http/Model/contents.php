<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class contents extends Model
{
    public $table = 'contents';


    protected $fillable = ['id','content','uid','time','rnum','fnum','pnum','hot','report'];

    public $timestamps = false;

    public function replay()
    {
    	return $this->hasMany('App\Http\Model\replay','uid','uid');
    }

    public function user_info()
    {
    	return $this->hasOne('App\Http\Model\user_info','uid','uid');	
    }
}
