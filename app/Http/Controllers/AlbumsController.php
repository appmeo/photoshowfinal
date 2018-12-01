<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
   
    public function index(){

        $albums = Album::with('photos')->get();
        return view('albums.index')->with('albums', $albums);
       
   }



    public function create(){
        return view('albums.create');
    
    }

    public function store(request $request){
        $this->validate($request, [
            'name' => 'required',
            'cover-image' => 'image|max:1999'
        ]);
            
        //get filename with and without extention to store in Storage en database.
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extention = $request->file('cover_image')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extention;
        //upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);
        //create album in database
        $album = new Album();
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;
        $album->save();
        return redirect('/albums')->with('success', 'Album created');
        }
    

}
