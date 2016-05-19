@extends('layouts.app')

@section('content')
        <!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($single, array('route' => array('singles.update', $single->single_id), 'method' => 'PUT')) }}

@include('singles.form')

{{ Form::submit('Aanpassen', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection