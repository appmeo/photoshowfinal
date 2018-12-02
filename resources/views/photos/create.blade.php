@extends('layouts.app')

@section('content')

<h3 class="mt-3 mb-4">Upload a Photo to Album</h3>

{!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::bsText('title', '', ['placeholder' => 'Photo Title'])}}
                        {{ Form::bsTextArea('description', '', ['placeholder' => 'Photo Description'])}}
                        {{ Form::hidden('album_id', $album_id) }}
                        {{ Form::file('photo') }}
                        {{ Form::bsSubmit('submit') }}
 {!! Form::close() !!}

@endsection