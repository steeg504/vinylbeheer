@extends('layouts.app')

@section('content')
        <!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($artist, array('route' => array('artists.update', $artist->artist_id), 'method' => 'PUT')) }}

@include('artists.form')

{{ Form::submit('Aanpassen', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection