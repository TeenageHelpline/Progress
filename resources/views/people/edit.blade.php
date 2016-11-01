@extends('layouts.master')
@section('title')
    Modify {{ $person->first_name }} {{ $person->last_name }}
@endsection

@section('content')
    @include('people.components.person-header')

    <form role="form" action="/people/{{ $person->id }}" method="post">
        <input type="hidden" name="_method" value="PUT" />
        {!! csrf_field() !!}
        <h3>Personal information</h3>
        <hr>
        @include('people.fields.personal-info')


        <hr>
        <h3>Contact information</h3>
        <hr>
        @include('people.fields.contact-info')

        <br>
        <button type="submit" class="btn btn-block btn-primary">Modify person</button>
    </form>
@endsection