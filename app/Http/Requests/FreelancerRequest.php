<?php

namespace App\Http\Requests;


class FreelancerRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string',
            'price' => 'required|int',
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
            'name.required' => 'Name required!',
            'price.required' => 'Price required!',
            'email.required' => 'Email required!',
            'phone.string' => 'Phone should be string'
        ];
    }

}
