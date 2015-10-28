@section('header')
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="progress-brand" href="/"><i class="fa fa-spinner"></i> <i>Progress</i> <span style="font-size: small;">HR</span></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <li><a href="/dashboard">Dashboard</a></li>
                    @endif

                    @if(Auth::check())
                        <li><a href="#"><i class="fa fa-fw fa-cogs"></i></a></li>
		                <li><a href="<?php echo route('userLogout'); ?>" title="Log out"><i class="fa fa-sign-out"></i></a></li>
		            @else
		                <li><a href="<?php echo route('userLogin'); ?>" title="Log in"><i class="fa fa-sign-in"></i></a></li>
                    @endif

                    <li><a href="#"><i class="fa fa-fw fa-question-circle"></i></a></li>
                    <li><a href="https://www.github.com/teenagehelpline/progress"><i class="fa fa-fw fa-github"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
