@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="header">
            <h4 class="title">Bewerk profiel</h4>
        </div>
        <div class="content">
            @foreach ($users as $user)
            <p>This is user {{ $user->id }}</p>
            @endforeach
        </div>
    </div>

@endsection