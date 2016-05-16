@extends('layouts.empty')
@section('content')
    <div class="card col-lg-4 col-lg-push-4" style="margin:40px auto;">
        <div class="header">
            <h4 class="title">Login</h4>
        </div>
        <div class="content">
            <form method="POST" action="/login">
                {!! csrf_field() !!}

                <div>
                    Email
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    Password
                    <input type="password" name="password" id="password">
                </div>

                <div>
                    <input type="checkbox" name="remember"> Remember Me
                </div>

                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection