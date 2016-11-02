<?php

namespace App\Http\Requests\Positions;

use App\Http\Requests\Request;

class UpdatePositionRequest extends Request
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
            'name' => 'required|unique:job_positions,name,'.$this->route('positions')
        ];
    }
}
