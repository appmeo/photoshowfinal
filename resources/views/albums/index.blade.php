@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-4"></div>
<div class="col-md-4">
  @if(count($albums) > 0)
    
      
        @foreach($albums as $album)
          
            
        <div class="card mt-3 text-center" style="width:20rem;border-radius:5px;">
          <a href="/albums/{{$album->id}}"><img class="thumbnail" style="border-radius:4px 4px 0px 0px;"src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}"></a>
          
            
          <h5 class="card-title mb-1 bg-light" style="padding:8px">{{$album->name}}</h5>
         
          <p class="mt-2" >{{$album->description}}</p>
          
        
        </div>
             
        @endforeach
      
      
  
@else
    
    <p>No Albums To Display</p>

@endif
</div>
</div>
@endsection
