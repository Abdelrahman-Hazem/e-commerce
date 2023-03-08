<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('dashboard.pages.permission.index',compact('roles'));
    }

    public function create()
    {
       return view('dashboard.pages.permission.create');
    }

    public function store(RoleRequest $request)
    {

        try {
            $role = $this->process(new Role ,$request);
            if($role){
                return redirect()->route('roles.index')->with(['success'=>'successfully Added']);
            }else{
                return redirect()->route('roles.index')->with(['error'=>'something went wrong']);
            }
        } catch (\Throwable $ex) {
            return  $ex;
            return redirect()->route('roles.index')->with(['error'=>'something went wrong']);
            
        }
    }

    public function edit(Role $role)
    {
        return view('dashboard.pages.permission.edit' ,compact('role'));

    }

    public function update($id ,RoleRequest $request)
    {
        try {
            $role = Role::findOrfail($id);
            $role=$this->process($role,$request);
            if($role){
                return redirect()->route('roles.index')->with(['success'=>'successfully updated']);
            }else{
                return redirect()->route('roles.index')->with(['error'=>'something went wrong']);
            }
        } catch (\Throwable $ex) {
            return  $ex;
            return redirect()->route('roles.index')->with(['error'=>'something went wrong']);
            
        }
    }

    public function process(Role $role ,Request $r)
    {
        $role->name = $r->name ;
        $role->permissions = json_encode($r->permissions) ;
        $role->save();
        return $role ;


    }
}

