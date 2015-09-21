@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.includes')
<!doctype html>
<html>
<head>
@yield('includes')
</head>
<body>
@yield('header')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 main center-block" style="float: none;">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
