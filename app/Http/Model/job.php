<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    public $table = 'job';

    protected $fillable = ['id','job'];

    public $timestamps = false;
}
