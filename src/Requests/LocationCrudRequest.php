<?php

namespace Flw\Signout\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationCrudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'state' => 'max:2',
        ];

        return $rules;
    }
}
