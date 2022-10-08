<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class ContactController extends Controller
{ 
    public function create()
    {
    	
    	return view('contact.create');
    }

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
