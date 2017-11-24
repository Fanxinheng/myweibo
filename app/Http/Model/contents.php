<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class contents extends Model
{
    public $table = 'contents';

    public $timestamps = false;

    protected $fillable = ['id','content','uid','time','rnum','fnum','pnum','hot','report'];

    public  function user_info(){

     return	$this->hasOne('App\Http\Model\user_info','uid','uid');
    }
    
}
