<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permission;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    public function index(){
        $permissions = permission::all();
        return view('permissionsview', compact('permissions'));
        //foreach ($permissions as $permission) {
            //dd($permission->name);
        //}
    }

    public function save(PermissionRequest $request){
       $permission = new permission;
       $permission->name = $request->name;
       $permission->save();
       return redirect('permisos');
    }

    public function edit($id){
        $permission = Permission::find($id);
        return view('editar-permiso',compact('permission'));
      }
  
      public function update(PermissionRequest $request,$id){
          $permission =  Permission::find($id);
          $permission->name = $request->name;
          $permission->save();
          return redirect('permisos');
       }
  
       public function delete($id){
          Permission::find($id)->delete();
          return redirect('permisos');
       }
}
