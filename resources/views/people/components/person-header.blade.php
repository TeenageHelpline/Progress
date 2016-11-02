<div class="row">
    <div class="col-md-2">
        <img style="border-radius: 100%; padding: 5px; border: 1px solid #ddd;" width="150" height="150" src="{{ url('/people', [$person->id, 'face']) }}"/>
    </div>
    <div class="col-md-10" style="padding-top: 40px; padding-left:20px;">
        <h1 style="margin-top: 0px; margin-bottom: 0px;">{{ $person->first_name }} {{ $person->last_name }}</h1>
        <h2 style="margin-top: 5px;" class="job-position-heading">{{ $person->jobPositions()->wherePivot('primary', true)->first()->name }} <span style="font-size: x-small; font-style: italic;" >/ {{ $person->roles()->wherePivot('primary', true)->first()->name }}</span></h2>
    </div>
</div>

<div class="btn-group btn-group-justified" role="group" style="margin-top: 15px; margin-bottom: 5px;">
    <a data-toggle="tooltip" data-placement="bottom" title="View details" role="button" href="/people/{{ $person->id }}" class="btn btn-info"><i class="fa fa-fw fa-address-card"></i></a>
    <a data-toggle="tooltip" data-placement="bottom" title="Add job position" role="button" href="#" class="btn btn-success"><i class="fa fa-fw fa-plus"></i><i class="fa fa-fw fa-briefcase"></i></a>
    <a data-toggle="tooltip" data-placement="bottom" title="Supporting documents" role="button" href="#" class="btn btn-info"><i class="fa fa-fw fa-id-card-o"></i></a>
    <a data-toggle="tooltip" data-placement="bottom" title="Modify details" role="button" href="/people/{{ $person->id }}/edit" class="btn btn-primary"><i class="fa fa-fw fa-pencil"></i></a>
    <a data-toggle="tooltip" data-placement="bottom" title="Background checks" role="button" href="#" class="btn btn-info"><i class="fa fa-fw fa-search"></i></a>
    <a data-toggle="tooltip" data-placement="bottom" title="Emergency contact details" role="button" href="#" class="btn btn-warning"><i class="fa fa-fw fa-exclamation-triangle"></i></a>
    <a data-toggle="tooltip" data-placement="bottom" title="Add login role" role="button" href="#" class="btn btn-success"><i class="fa fa-fw fa-plus"></i><i class="fa fa-fw fa-user-circle-o"></i></a>
    <a data-toggle="tooltip" data-placement="bottom" title="Delete person" role="button" href="#" class="btn btn-danger"><i class="fa fa-fw fa-minus-circle"></i></a>
</div>

<hr>