@extends('layouts.app')

@section('content')

<h3>Create a Album</h3>

{!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::bsText('name', '', ['placeholder' => 'Album Name'])}}
                        {{ Form::bsTextArea('description', '', ['placeholder' => 'Album Description'])}}
                        {{ Form::file('cover_image')}}
                        {{ Form::bsSubmit('submit') }}
 {!! Form::close() !!}

@endsection