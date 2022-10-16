<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function store()
    {
    	$data = request()->validate([
         'name' => 'required' ,
         'email' => 'required' ,
         'message' => 'required' ,
    	]);
      Mail::to('hboody81@gmail.com')->send(new ContactMail($data));
      return redirect('/');
    }
}
