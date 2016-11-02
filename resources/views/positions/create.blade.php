@extends('layouts.master')
@section('title')
    Create Job Position
@endsection

@section('content')
    <h1 class="page-header">Create Job Position</h1>
    <form method="post" action="/positions">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Job position name</label>
            <input type="text" class="form-control" name="name" id="name" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success">Create job position</button>
        </div>
    </form>

@endsection