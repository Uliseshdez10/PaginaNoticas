<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\grouup;
use App\Http\Requests\GroupRequest;

class grouupController extends Controller
{
   public function index(){
      $grouups = grouup::all();
      return view('grouupsview', compact('grouups'));
  }

  public function save(GroupRequest $request){
     $grouup = new grouup;
     $grouup->name = $request->name;
     $grouup->Keyname = $request->Keyname;
     $grouup->description = $request->description;
     $grouup->save();
     return redirect('grupos');
  }

  public function edit($id){
      $grouup = Grouup::find($id);
      return view('editar-grupo',compact('grouup'));
    }

    public function update(GroupRequest $request,$id){
        $grouup =  Grouup::find($id);
        $grouup->name = $request->name;
        $grouup->Keyname = $request->Keyname;
        $grouup->description = $request->description;
        $grouup->save();
        return redirect('grupos');
     }

     public function delete($id){
        Grouup::find($id)->delete();
        return redirect('grupos');
     }
}
