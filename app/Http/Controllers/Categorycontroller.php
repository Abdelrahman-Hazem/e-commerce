<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category ;
use Illuminate\Support\Facades\DB;
use App\Models\Product ;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Categorycontroller extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth:admin');
    }

   



  
  }
