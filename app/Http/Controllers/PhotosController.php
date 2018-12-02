<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id){
        return view('photos.create')->with('album_id', $album_id);
    }



    
        public function store(request $request){
            
            $this->validate($request, [
                'title' => 'required',
                'photo' => 'image|max:1999'
            ]);
                
            //get filename with and without extention to store in Storage en database.
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extention;
            //upload image
            $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);
            //upload foto in database
            $photo = new Photo();
            $photo->title = $request->input('title');
            $photo->album_id = $request->input('album_id');
            $photo->description = $request->input('description');
            $photo->size = $request->file('photo')->getClientSize();
            $photo->photo = $filenameToStore;
            $photo->save();
            return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Saved');
            
    }
}
