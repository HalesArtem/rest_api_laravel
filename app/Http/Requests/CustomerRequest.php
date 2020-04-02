<?php

namespace App\Http\Requests;


class CustomerRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'string',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'phone.string' => 'Phone should be sting'
        ];
    }

}
