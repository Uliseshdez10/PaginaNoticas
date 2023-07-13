<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(){
        $users = user::all();
        return view('userview', compact('users'));
    }

    public function save(UserRequest $request){
       $user = new user;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->save();
       return redirect('usuarios');
    }

    public function edit($id){
        $user = User::find($id);
        return view('editar-usuario',compact('user'));
      }
  
      public function update(UserRequest $request,$id){
          $user =  User::find($id);
          $user->name = $request->name;
          $user->email = $request->email;
          //$user->password = $request->password;
          $user->save();
          return redirect('usuarios');
       }
  
       public function delete($id){
          User::find($id)->delete();
          return redirect('usuarios');
       }
}
