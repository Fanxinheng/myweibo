<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class label extends Model
{
    public $table = 'label';

    protected $fillable = ['id','content'];

    public $timestamps = false;
}
