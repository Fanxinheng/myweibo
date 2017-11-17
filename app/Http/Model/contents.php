<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class contents extends Model
{
    public $table = 'contents';

    protected $fillable = ['id','content','uid','time','rnum','fnum','pnum','hot','report'];

    public $timestamps = false;
}
