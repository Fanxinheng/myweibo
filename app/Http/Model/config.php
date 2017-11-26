<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    public $table = 'config';

    protected $fillable = ['id','name','logo','bank'];


    public $timestamps = false;
}
