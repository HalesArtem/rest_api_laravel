<?php


namespace App\Http\Controllers;


class FreelancerController extends ApiControllers
{
    public function __construct(Freelancer $model)
    {
    $this->model = $model;
    }
}
