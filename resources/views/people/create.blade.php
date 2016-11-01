@extends('layouts.master')
@section('title')
    New Person
@endsection

@section('content')
    <h1 class="page-header">Add New Person</h1>
    <p>Use the form below to add a new person's details to Progress. Once added, you will be able to assign this
    person job roles, and upload supporting documents.</p>
    <hr>
    <form role="form" action="/people" method="post">
        {!! csrf_field() !!}
        <h3>Personal information</h3>
        <hr>
        @include('people.fields.personal-info')


        <hr>
        <h3>Contact information</h3>
        <hr>
        @include('people.fields.contact-info')

        <br>
        <button type="submit" class="btn btn-block btn-success">Add new person</button>
    </form>
@endsection