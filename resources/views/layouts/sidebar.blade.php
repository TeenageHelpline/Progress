@section('sidebar')
    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <li @if(Request::is('dashboard')) class="active" @endif><a href="{{ url('dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> {{ trans('sidebar.dashboard') }} <span class="sr-only">(current)</span></a></li>
            <li><a href="#"><i class="fa fa-fw fa-pie-chart"></i> {{ trans('sidebar.reports') }}</a></li>
            <li><a href="#"><i class="fa fa-fw fa-arrow-right"></i> {{ trans('sidebar.export-data') }}</a></li>
            <li><a href="#"><i class="fa fa-fw  fa-arrow-left"></i> {{ trans('sidebar.import-data') }}</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li @if(Request::is('person*')) class="active" @endif><a href="{{ url('person') }}"><i class="fa fa-fw fa-users"></i> {{ trans('sidebar.list-people') }}</a></li>
            <li><a href=""><i class="fa fa-fw fa-user"></i> {{ trans('sidebar.new-person') }}</a></li>
            <li><a href=""><i class="fa fa-fw fa-clock-o"></i> {{ trans('sidebar.time-tracker') }}</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li><a href=""><i class="fa fa-fw fa-briefcase"></i> {{ trans('sidebar.list-job-positions') }}</a></li>
            <li><a href=""><i class="fa fa-fw fa-plus"></i> {{ trans('sidebar.new-job-position') }}</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li><a href=""><i class="fa fa-fw fa-folder-open"></i> {{ trans('sidebar.list-job-openings') }}</a></li>
            <li><a href=""><i class="fa fa-fw fa-file-text"></i> {{ trans('sidebar.list-job-applications') }}</a></li>
        </ul>
    </div>
@endsection