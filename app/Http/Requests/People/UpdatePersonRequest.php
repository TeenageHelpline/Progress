<?php

namespace App\Http\Requests\People;

use App\Http\Requests\Request;

class UpdatePersonRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first-name' => 'required',
            'last-name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address-one' => 'required',
            'address-two' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'country' => 'required',
            'personal-email' => 'required',
            'work-email' => array('required', 'unique:users,email,'.$this->route('people')),
            'personal-telephone' => 'required',
        ];
    }
}
