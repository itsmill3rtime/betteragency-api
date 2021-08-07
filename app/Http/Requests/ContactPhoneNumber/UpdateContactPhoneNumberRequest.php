<?php

namespace App\Http\Requests\ContactPhoneNumber;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactPhoneNumberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('update', request()->contactPhoneNumber);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone_number_type'  => [
                'required',
                Rule::in(['home', 'cell', 'work']),
            ],
            'phone_number_value' => [
                'required',
                //todo:: would write a validation rule that would validate phone number syntax
            ],
            'phone_ext'          => [
                'nullable',
                'integer',
            ],
        ];
    }
}
