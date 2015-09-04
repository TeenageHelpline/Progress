@include('layouts.header')
@include('layouts.sidebar')
<!doctype html>
<html>
<head>
    <title>@yield('title')</title>

    <!-- CSS -->
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/theme.css') }}" rel="stylesheet" type="text/css"/>

    <!-- JS -->
    <script src="{{ asset('/assets/js/app.js') }}"></script>
</head>
<body>
@yield('header')

<div class="container-fluid">
    <div class="row">
        @yield('sidebar')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>