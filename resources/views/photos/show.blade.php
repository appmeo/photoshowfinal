@extends('layouts.app')

@section('content')

<h3 class="mt-3 mb-4">{{$photo->title}}</h3>
<p class="mt-3 mb-4">{{$photo->description}}</p>
<img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="">
<hr>
<a href="/albums/{{$photo->album_id}}">Back To Gallery</a>
{!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST', 'class' => 'float-right']) !!}
	{{ Form::hidden('_method', 'DELETE') }}
   	{{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger']) }}
    {!! Form::close() !!}


@endsection