<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    //
    public function index(Requests $request)
    {	
    	
    	return view('homes.details');
    }
}
