<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin ;
use App\Traits\SaveImageTrait;
// to store image
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

  use SaveImageTrait;

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
     
    	$admins = Admin::all();
    	return view('dashboard.pages.index',compact('admins'));
    }
    public function create()
    {
    	return view('dashboard.pages.create_admins_form');
    }

    public function store(Request $request)
    {

      $file_name = $this->saveImage($request->image,'images/admins');

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->password = $request->password;
        $admin->image = $file_name;
        $admin->save();
    
    	return redirect('admins');
    }
   


    public function edit(Admin $admin)
    {
      return view ('dashboard.pages.admins_edit', compact('admin'));
    }

    public function update(Admin $admin)
    {
      $admin->update($this->validateRequest());
      return redirect('admins');
    }
     public function show(Admin $admin)
    {
      return view('dashboard.pages.admin_show' , compact('admin'));
    }

    public function destroy(Admin $admin)
    {
      $admin->delete();
      return redirect('admins');
    }
   
}
