<div class="form-group">
    {{ Form::label('name', 'Naam') }}
    {{ Form::text('name', $artist->name, array('class' => 'form-control')) }}
</div>