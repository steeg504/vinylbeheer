@extends('layouts.empty')

@section('content')

    <div class="card">
        <div class="header">
            <h4 class="title">Kies sitegroup</h4>
        </div>
        <div class="content">
            @foreach (Auth::user()->getSitegroups() as $sitegroup)
                <a href="/sitegroups/{{ $sitegroup->sitegroup_id }}">{{ $sitegroup->name }}</a></p>
            @endforeach
        </div>
    </div>

@endsection