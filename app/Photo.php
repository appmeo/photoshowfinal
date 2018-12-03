<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;

class Photo extends Model
{
    protected $fillable = array('album_id', 'description', 'photo' , 'size');
    
    public function album(){
        return $this->belongsTo('App\Album');
    }
}
