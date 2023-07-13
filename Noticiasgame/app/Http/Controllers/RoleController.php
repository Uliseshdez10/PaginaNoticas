<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function index(){
        $role = Role::find(1);
        $role->permissions()->sync([1,2,3,4,5,6,7,8]);
        $roles = Role::with('users','permissions')->get();
        return view('rolesview', compact('roles'));
    }

    public function save(RoleRequest $request){
       $role = new Role;
       $role->name = $request->name;
       $role->save();
       return redirect('roles');
    }

    public function edit($id){
      $role = Role::find($id);
      return view('editar-rol',compact('role'));
    }

    public function update(RoleRequest $request,$id){
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        return redirect('roles');
     }

     public function delete($id){
        Role::find($id)->delete();
        return redirect('roles');
     }
}
