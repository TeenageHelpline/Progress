@extends('layouts.master')
@section('title')
    People
@endsection

@section('content')
    <h1 class="page-header">People</h1>

    <table class="table table-striped" id="personListTable">
        <thead>
            <tr>
                <td><h5>First Name</h5></td>
                <td><h5>Surname</h5></td>
                <td><h5>Gender</h5></td>
                <td><h5>Email Address</h5></td>
                <td><h5>Primary Position</h5></td>
            </tr>
        </thead>
        <tbody>
            @foreach($people as $person)
                <tr>
                    <td>{{ $person->first_name }}</td>
                    <td>{{ $person->last_name }}</td>
                    <td>
                        @if($person->gender == 'm')
                            <i class="fa fa-2x fa-male"></i>
                        @else
                            <i class="fa fa-2x fa-female"></i>
                        @endif
                    </td>
                    <td>{{ $person->email }}</td>
                    <td>{{ $person->jobPositions()->first()->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection