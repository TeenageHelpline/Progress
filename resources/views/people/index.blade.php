@extends('layouts.master')
@section('title')
    People
@endsection

@section('content')
    <h1 class="page-header">{{ ucwords(trans('people.people')) }}</h1>
    <br>
    <p> {{ trans('people.list-blurb') }}</p>
    <br>
    <table class="table table-striped" id="personListTable">
        <thead>
            <tr>
                <td><h5>{{ ucwords(trans('people.first-name')) }}</h5></td>
                <td><h5>{{ ucwords(trans('people.last-name')) }}</h5></td>
                <td><h5>{{ ucwords(trans('people.gender')) }}</h5></td>
                <td><h5>{{ ucwords(trans('people.email-address')) }}</h5></td>
                <td><h5>{{ ucwords(trans('people.primary-job-position')) }}</h5></td>
            </tr>
        </thead>
        <tbody>
            @foreach($people as $person)
                <tr>
                    <td><a href="{{ url('people', [$person->id]) }}">{{ $person->first_name }}</a></td>
                    <td><a href="{{ url('people', [$person->id]) }}">{{ $person->last_name }}</a></td>
                    <td>
                        @if($person->gender == 'm')
                            <i class="fa fa-2x fa-male"></i>
                        @else
                            <i class="fa fa-2x fa-female"></i>
                        @endif
                    </td>
                    <td>{{ $person->email }}</td>
                    <td>{{ $person->jobPositions()->wherePivot('primary', true)->first()->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $people->links() }}

@endsection