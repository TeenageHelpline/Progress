<h4>Address</h4>

<div class="form-group">
    <label for="address-one">Address line one</label>
    <input name="address-one" id="address-one" class="form-control" type="text" value="{{ $person->address1 }}">
</div>

<div class="form-group">
    <label for="address-two">Address line two</label>
    <input name="address-two" id="address-two" class="form-control" type="text" value="{{ $person->address2 }}">
</div>

<div class="form-group">
    <label for="city">Town/city</label>
    <input name="city" id="city" class="form-control" type="text" value="{{ $person->city }}">
</div>

<div class="form-group">
    <label for="state">County/state</label>
    <input name="state" id="state" class="form-control" type="text" value="{{ $person->state }}">
</div>

<div class="form-group">
    <label for="postcode">Postal code</label>
    <input name="postcode" id="postcode" class="form-control" type="text" value="{{ $person->zip }}">
</div>

<div class="form-group">
    <label for="country">Country</label>
    <input name="country" id="country" class="form-control" type="text" value="{{ $person->country }}">
</div>

<br>
<h4>Email and telephone</h4>
<div class="form-group">
    <label for="personal-email">Personal email</label>
    <input name="personal-email" id="personal-email" class="form-control" type="text" value="{{ $person->personal_email }}">
</div>
<div class="form-group">
    <label for="work-email">Work email</label>
    <input name="work-email" id="work-email" class="form-control" type="text" value="{{ $person->email }}">
</div>
<br>
<div class="form-group">
    <label for="personal-telephone">Personal phone number</label>
    <input name="personal-telephone" id="personal-telephone" class="form-control" type="text" value="{{ $person->personal_telephone }}">
</div>
<div class="form-group">
    <label for="work-telephone">Work phone number</label>
    <input name="work-telephone" id="work-telephone" class="form-control" type="text" value="{{ $person->work_telephone }}">
</div>