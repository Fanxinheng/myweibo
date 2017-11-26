<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class contents extends Model
{
    public $table = 'contents';


    //去除自动带的update_at....
    public $timestamps = false;

    //微博的回复


    protected $fillable = ['id','content','uid','time','rnum','fnum','pnum','hot','report'];


    public function replay()
    {
    	return $this->hasMany('App\Http\Model\replay','tid','cid');
    }


    //发帖人的信息
    public function user_info()
   {
   		return $this->hasOne('App\Http\Model\user_info','uid','uid');
   }

}
