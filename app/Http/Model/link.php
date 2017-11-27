<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class link extends Model
{
    public $table = 'link';


    protected $fillable = ['id','link','user','time','status'];

    public $timestamps = false;
}
