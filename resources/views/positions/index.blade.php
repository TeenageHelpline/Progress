@extends('layouts.master')
@section('title')
    Job Positions
@endsection

@section('content')
    <h1 class="page-header">Job Positions</h1>
    <p>View job positions below</p>
    <br>
    <table class="table table-striped" id="positionsListTable">
        <thead>
            <tr>
                <td><h5>Position Name</h5></td>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $position)
                <tr>
                    <td><a href="{{ url('positions', [$position->id, 'edit']) }}">{{ $position->name }}</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $positions->links() }}

@endsection