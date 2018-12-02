@extends('layouts.app')

@section('content')

          
<h1 class="mt-3">{{$album->name}}</h1>
<a href="/" class="btn btn-outline-info">Go Back</a>
<a href="/photos/create/{{$album->id}}" class="btn btn-outline-success">Upload Photo</a>
<hr>
             
    
@endsection
