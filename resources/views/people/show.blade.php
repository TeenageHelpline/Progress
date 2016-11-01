@extends('layouts.master')
@section('title')
    {{ $person->first_name }} {{ $person->last_name }}
@endsection

@section('content')
    @include('people.components.person-header')

    <h3>Personal information</h3>
    <hr>

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

    <!-- DOB -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Date of Birth</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ \Carbon\Carbon::parse($person->dob)->toFormattedDateString() }}</p>
        </div>
    </div>


    <!-- Age -->
    <div class="row">
        <div class="col-md-2">
            <p><b>Age</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ \Carbon\Carbon::parse($person->dob)->age }} years</p>
        </div>
    </div>

    <hr>

    <h3>Contact information</h3>
    <hr>

    <!-- Address Line 1 -->
    <div class="row">
        <div class="col-md-3">
            <p><b>Address Line One</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->address1 }}</p>
        </div>
    </div>

    <!-- Address Line 2 -->
    <div class="row">
        <div class="col-md-3">
            <p><b>Address Line Two</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->address2 }}</p>
        </div>
    </div>

    <!-- City -->
    <div class="row">
        <div class="col-md-3">
            <p><b>Town/City</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->city }}</p>
        </div>
    </div>

    <!-- County/State-->
    <div class="row">
        <div class="col-md-3">
            <p><b>County/State</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->state }}</p>
        </div>
    </div>

    <!-- Postal Code -->
    <div class="row">
        <div class="col-md-3">
            <p><b>Postal Code</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->zip }}</p>
        </div>
    </div>

    <!-- Country -->
    <div class="row">
        <div class="col-md-3">
            <p><b>Country</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->country }}</p>
        </div>
    </div>

    <br>

    <!-- Email -->
    <div class="row">
        <div class="col-md-3">
            <p><b>Work Email Address</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->email }}</p>
        </div>
    </div>

    <!-- Email -->
    <div class="row">
        <div class="col-md-3">
            <p><b>Personal Email Address</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->personal_email }}</p>
        </div>
    </div>

    <!-- Mobile Num -->
    <div class="row">
        <div class="col-md-3">
            <p><b>Work Phone Number</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->work_telephone }}</p>
        </div>
    </div>

    <!-- Telephone -->
    <div class="row">
        <div class="col-md-3">
            <p><b>Personal Phone Number</b></p>
        </div>
        <div class="col-md-5">
            <p>{{ $person->personal_telephone }}</p>
        </div>
    </div>



@endsection