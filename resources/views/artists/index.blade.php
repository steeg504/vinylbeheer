@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="header">
            <h4 class="title">Artiesten</h4>
            <p class="category">Overzicht van alle artiesten</p>
        </div>
        <div class="content table-responsive table-full-width">
            <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 text-right">
                    <a class="btn" href="{{ URL::to('artists/create') }}">Artiest toevoegen</a>
                </div>
            </div>
            </div>
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Artiest</th>
                    <th>Singles</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($artists as $artist)
                <tr>
                    <td>{{ $artist->artist_id }}</td>
                    <td>{{ $artist->name }}</td>
                    <td>
                        {{--*/ $komma = '' /*--}}
                        @foreach($artist->getSingles() as $single)
                            {{ $komma }} {{ $single->sideA }}
                            {{--*/ $komma = ', ' /*--}}
                        @endforeach
                    </td>
                    <td><a href="{{ URL::to('artists/' . $artist->artist_id . '/edit') }}">Bewerk</a></td>
                    <td>
                        {!! Form::open(array('action' => 'ArtistController@destroy','url' => '/artists/'.$artist->artist_id, 'class'=>'pull-right', 'method' => 'DELETE')) !!}

                        {!! Form::submit('Verwijderen', ['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Weet je zeker dat je deze artiest wilt verwijderen? Je verwijdert dan ook de singles!\')']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
