<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    public $table = 'notice';


    protected $fillable = ['id','content','time'];

    public $timestamps = false;
}
