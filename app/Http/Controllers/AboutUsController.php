<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
       public function __construct()
  {
    $this->middleware('auth')->except(['index']);
  }

    public function index()
    {
    	return view('frontend.pages.about');
    }
}
