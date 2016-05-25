<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('name') - Vinylbeheer - @yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="/css/style.css" rel="stylesheet" />


</head>
<body>
<div class="wrapper">

    @include('sections.sidebar')

    <div class="main-panel">

        @include('sections.topnavigation')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>

        @include('sections.footer')

    </div>
</div>


</body>

<script src="/js/javascript.js" type="text/javascript"></script>

</html>
