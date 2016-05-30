<div class="form-group">
    {{ Form::label('sideA', 'Kant A') }}
    {{ Form::text('sideA', $single->sideA, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('sideB', 'Kant B') }}
    {{ Form::text('sideB', $single->sideB, array('class' => 'form-control')) }}
</div>
@foreach($single->getArtists() as $artist)
    <div class="form-group">

        {{ Form::label('artist', 'Artiest') }} <small class="remove text-right">Verwijder</small>
        {{ Form::select('artist[]',$artists,$artist->artist_id,array('class' => 'form-control artistSelect')) }}
    </div>
@endforeach

<div class="form-group">

    {{ Form::label('artist', 'Artiest') }} <small class="remove text-right">Verwijder</small>
    {{ Form::select('artist[]',$artists,"",array('class' => 'form-control artistSelect')) }}
</div>


@foreach(Session::get('sitegroup')->first()->getFields() as $field)
   {!! $field->showHTML() !!}
@endforeach