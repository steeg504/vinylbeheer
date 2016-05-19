<div class="form-group">
    {{ Form::label('sideA', 'Kant A') }}
    {{ Form::text('sideA', $single->sideA, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('sideB', 'Kant B') }}
    {{ Form::text('sideB', $single->sideB, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('artist', 'Artiest') }}
    {{ Form::select('artist[]',$artists,, array('class' => 'form-control')) }}
</div>