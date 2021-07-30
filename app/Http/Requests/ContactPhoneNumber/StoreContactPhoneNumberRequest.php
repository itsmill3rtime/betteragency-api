<?php

namespace App\Http\Requests\ContactPhoneNumber;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactPhoneNumberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('store', request()->contactPhoneNumber);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contact_id'         => [
                'required',
                Rule::exists('contacts', 'id')->where('agency_id', '=', auth()->user()->agency_id),
            ],
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
