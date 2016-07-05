@extends('layouts.master')
@section('title')
    {{ $person->first_name }} {{ $person->last_name }}
@endsection

@section('content')
    <h1 style="margin-top: 0px;">{{ $person->first_name }} {{ $person->last_name }}</h1>
    <h2 class="page-header job-position-heading">{{ $person->jobPositions()->first()->name }}</h2>
@endsection