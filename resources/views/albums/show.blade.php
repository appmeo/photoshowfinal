@extends('layouts.app')

@section('content')

          
<h1>{{ $album->name }}</h1>
<a href="/" class="btn btn-outline-info">Go Back</a>
<a href="/photos/create/{{ $album->id }}" class="btn btn-outline-success">Upload Photo</a>
<hr>

@if(count($album->photos) > 0)
    
      
        @foreach($album->photos as $photo)
          
            
        <div class="card mt-3 text-center" style="width:20rem;border-radius:5px;">
          <a href="/photos/{{$photo->id}}"><img class="thumbnail" style="border-radius:4px 4px 0px 0px;" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}"></a>
          
            
          <h5 class="card-title mb-1 bg-light" style="padding:8px">{{ $photo->title }}</h5>
         
          <p class="mt-2" >{{$album->description}}</p>
          
        
        </div>
             
        @endforeach
      
      
  
@else
    
    <p>No Photos To Display</p>

@endif
             
    
@endsection
