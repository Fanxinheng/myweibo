<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
   public $table = 'message';


   public $timestamps = false;

   protected $fillable = ['id','aid','uid','mess','time','status'];


}
