@extends('layouts.master')
@section('title')
    New Person
@endsection

@section('content')
    <h1 class="page-header">Add New Person</h1>
    <p>Use the form below to add a new person's details to Progress. Once added, you will be able to assign this
    person job roles, and upload supporting documents.</p>
    <hr>
    <h3>Personal information</h3>
    <hr>
    <div class="form-group">
        <label for="first-name">First name</label>
        <input name="first-name" id="first-name" class="form-control" type="text">
    </div>
    <div class="form-group">
        <label for="last-name">Last name</label>
        <input name="last-name" id="last-name" class="form-control" type="text">
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control">
            <option value="m">Male</option>
            <option value="f">Female</option>
        </select>
    </div>

    <div class="form-group">
        <label for="dob">Date of birth</label>
        <input name="dob" id="dob" class="form-control" type="text" placeholder="DD/MM/YYYY">
    </div>


    <hr>
    <h3>Contact information</h3>
    <hr>

    <h4>Address</h4>

    <div class="form-group">
        <label for="address-one">Address line one</label>
        <input name="address-one" id="address-one" class="form-control" type="text">
    </div>

    <div class="form-group">
        <label for="address-two">Address line two</label>
        <input name="address-two" id="address-two" class="form-control" type="text">
    </div>

    <div class="form-group">
        <label for="city">Town/city</label>
        <input name="city" id="city" class="form-control" type="text">
    </div>

    <div class="form-group">
        <label for="state">County/state</label>
        <input name="state" id="state" class="form-control" type="text">
    </div>

    <div class="form-group">
        <label for="postcode">Postal code</label>
        <input name="postcode" id="postcode" class="form-control" type="text">
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <input name="country" id="country" class="form-control" type="text">
    </div>

    <br>
    <h4>Email and telephone</h4>
    <div class="form-group">
        <label for="personal-email">Personal email</label>
        <input name="personal-email" id="personal-email" class="form-control" type="text">
    </div>
    <div class="form-group">
        <label for="work-email">Work email</label>
        <input name="work-email" id="work-email" class="form-control" type="text">
    </div>
    <br>
    <div class="form-group">
        <label for="personal-telephone">Personal telephone</label>
        <input name="personal-telephone" id="personal-telephone" class="form-control" type="text">
    </div>
    <div class="form-group">
        <label for="work-telephone">Work telephone</label>
        <input name="work-telephone" id="work-telephone" class="form-control" type="text">
    </div>
    <br>
    <button type="submit" class="btn btn-block btn-success">Add new person</button>
@endsection