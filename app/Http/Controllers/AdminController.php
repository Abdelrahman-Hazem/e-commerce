<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin ;
use App\Models\Role;
use App\Traits\SaveImageTrait;
use Illuminate\Auth\Events\Validated;
// to store image
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

  use SaveImageTrait;

     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$admins = Admin::latest()->where('id','<>',auth()->id())->get();
    	return view('dashboard.pages.admins.index',compact('admins'));
    }
    public function create()
    {
      $roles = Role::get();
    	return view('dashboard.pages.admins.create',compact('roles'));
    }

    public function store(AdminRequest $request)
    {
      $file_name = $this->saveImage($request->image,'images/admins');

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role_id = $request->role_id;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->password = bcrypt( $request->password);
        $admin->image = $file_name;
        $admin->save();
    	return redirect('admins');
    }
   
  // public function store(AdminRequest $request)
  // {
  //    $this->saveImage($request->image,'images/admins');
  //   Admin::create($request->validated());
  //    	return redirect('admins');
    
  // }

    public function edit(Admin $admin)
    {
      return view ('dashboard.pages.admins.edit', compact('admin'));
    }

    public function update(Admin $admin)
    {
      $admin->update($this->validateRequest());
      return redirect('admins');
    }
     public function show(Admin $admin)
    {
      return view('dashboard.pages.admins.show' , compact('admin'));
    }

    public function destroy(Admin $admin)
    {
      $admin->delete();
      return redirect('admins');
    }
   
}
