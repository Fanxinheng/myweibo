<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    public $table = 'report';


    public $timestamps = false;

    protected $fillable = ['id','rid','uid','tid','content','time'];

}
