@include('layouts.header')

<!doctype html>
<html>
<head>
    <title>@yield('title')</title>

    <!-- CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css"/>

    <!-- JS -->
    <script src="{{ asset('/js/app.js') }}"></script>
</head>
<body>
@yield('header')
<div id="content-container">
    @yield('content')
</div>

</body>
</html>