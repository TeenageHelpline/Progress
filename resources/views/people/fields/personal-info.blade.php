<div class="form-group">
    <label for="first-name">First name</label>
    <input name="first-name" id="first-name" class="form-control" type="text" value="{{ $person->first_name }}">
</div>
<div class="form-group">
    <label for="last-name">Last name</label>
    <input name="last-name" id="last-name" class="form-control" type="text" value="{{ $person->last_name }}">
</div>

<div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" id="gender" class="form-control">
        <option @if($person->gender == "m") selected @endif value="m">Male</option>
        <option @if($person->gender == "f") selected @endif value="f">Female</option>
    </select>
</div>

<div class="form-group">
    <label for="dob">Date of birth</label>
    <input name="dob" id="dob" class="form-control" type="text" placeholder="DD/MM/YYYY" value="{{ \Carbon\Carbon::parse($person->dob)->format('d/m/Y') }}">
</div>