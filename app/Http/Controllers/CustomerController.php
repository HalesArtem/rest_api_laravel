<?php

namespace App\Http\Controllers;


use App\Customer;
use App\Http\Requests\CustomerRequest;

class CustomerController extends ApiControllers
{

    /**
     * CustomerController constructor.
     * @param Customer $model
     * @param CustomerRequest $request
     */
    public function __construct(Customer $model, CustomerRequest $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
}
