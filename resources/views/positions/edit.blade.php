@extends('layouts.master')
@section('title')
    Modify Job Positions
@endsection

@section('content')
    <h1 class="page-header">Modify Job Position</h1>
    <form method="post" action="/positions/{{ $position->id }}">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT" />
        <div class="form-group">
            <label for="name">Job position name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $position->name }}" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Modify job position</button>
        </div>
    </form>

@endsection