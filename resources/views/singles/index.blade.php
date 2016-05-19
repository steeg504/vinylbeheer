@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="header">
            <h4 class="title">Singles</h4>
            <p class="category">Overzicht van alle singles</p>
        </div>
        <div class="content table-responsive table-full-width">
            <div class="row">
                <div class="col-xs-12">
                    <a class="btn pull-right" href="{{ URL::to('singles/create') }}">Single toevoegen</a>
                </div>
            </div>
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Artiest</th>
                    <th>Kant A</th>
                    <th>Kant B</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($singles as $single)
                <tr>
                    <td>{{ $single->single_id }}</td>
                    <td>
                        {{--*/ $komma = '' /*--}}
                        @foreach($single->getArtists() as $artist)
                            {{ $komma }} {{ $artist->name }}
                            {{--*/ $komma = ', ' /*--}}
                        @endforeach
                    </td>
                    <td>{{ $single->sideA }}</td>
                    <td>{{ $single->sideB }}</td>
                    <td><a href="{{ URL::to('singles/' . $single->single_id . '/edit') }}">Bewerk</a></td>
                    <td>
                        {!! Form::open(array('action' => 'SingleController@destroy','url' => '/singles/'.$single->single_id, 'class'=>'pull-right', 'method' => 'DELETE')) !!}

                        {!! Form::submit('Verwijderen', ['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Weet je het zeker?\')']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
