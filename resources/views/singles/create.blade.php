@extends('layouts.app')

@section('content')
        <!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'singles')) }}

@include('singles.form')

{{ Form::submit('Invoeren', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection