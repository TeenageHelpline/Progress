@extends('layouts.master')
@section('title')
    {{ $person->first_name }} {{ $person->last_name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-1">
            <img style="border-radius: 100%; padding: 5px; border: 1px solid #ddd;" width="150" height="150" src="{{ url('/person', [$person->id, 'face']) }}"/>
        </div>
        <div class="col-md-10" style="padding-top: 30px; padding-left:60px;">
            <h1 style="margin-top: 0px;">{{ $person->first_name }} {{ $person->last_name }}</h1>
            <h2 class="job-position-heading">{{ $person->jobPositions()->first()->name }}</h2>
        </div>
    </div>

    <hr>

    <h3>Personal Information</h3>
    <br>

    <!-- First name -->
    <div class="row">
        <div class="col-md-2">
            <p><b>First Name</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->first_name }}</p>
        </div>
    </div>

    <!-- Last name -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Last Name</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->last_name }}</p>
        </div>
    </div>

    <!-- Gender -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Gender</b></p>
        </div>
        <div class="col-md-5">
            {{ $person->gender == 'm' ? 'Male' : 'Female' }}
        </div>
    </div>

    <br>

    <!-- Age -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Age</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ \Carbon\Carbon::parse($person->dob)->age }} years</p>
        </div>
    </div>

    <!-- DOB -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Date of Birth</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->dob }}</p>
        </div>
    </div>


    <hr>

    <h3>Contact Information</h3>
    <br>

    <!-- Address Line 1 -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Address Line One</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->address1 }}</p>
        </div>
    </div>

    <!-- Address Line 2 -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Address Line Two</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->address2 }}</p>
        </div>
    </div>

    <!-- City -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Town/City</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->city }}</p>
        </div>
    </div>

    <!-- County/State-->
    <div class="row">
        <div class="col-md-2">
            <p><b>County/State</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->state }}</p>
        </div>
    </div>

    <!-- Postal Code -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Postal Code</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->zip }}</p>
        </div>
    </div>

    <!-- Country -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Country</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->country }}</p>
        </div>
    </div>

    <br>

    <!-- Email -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Email Address</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->email }}</p>
        </div>
    </div>

    <!-- Mobile Num -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Mobile Phone Number</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->mobile_telephone }}</p>
        </div>
    </div>

    <!-- Telephone -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Telephone Number</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->telephone }}</p>
        </div>
    </div>



@endsection