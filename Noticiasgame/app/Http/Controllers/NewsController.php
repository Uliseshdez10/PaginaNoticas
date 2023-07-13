<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function inicio(){
        $news = News::orderBy('id','DESC')->get()->take(4);
        return view('index', compact('news'));
    }

    public function index(){
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function addnews(){
        return view('news.addnews');
    }

    public function savenews(NewsRequest $request){
        // Guardar imagen con storage disk
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        //$file = storeAs('public', $filename);
        Storage::disk('local')->putFileAs('public', $file, $filename);
        $news = new News;
        $news->tittle = $request->tittle;
        $news->keyname = Str::slug($request->tittle);
        $news->image = $filename;
        $news->description = $request->description;
        $news->save();
        return redirect('noticias');
    }

    public function editnews($id){
        $news = News::find($id);
        return view('editnews', compact('news'));
    }

    public function updatenews(Request $request, $id){
        $news = News::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file = storeAs('public',$filename);
            //Storage::disk('local')->putFileAs('public', $file, $filename);
        }else{
            $filename = $news->image;
        }
        $news->tittle = $request->tittle;
        $news->keyname = Str::slug($request->tittle);
        $news->image = '';
        $news->description = $request->description;
        $news->save();
        return redirect('noticias');
    }

    public function deletenews(){
        News::find($id)->delete();
        return redirect('noticias');
    }
}