<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{

    protected $table = 'freelancers';

    protected $fillable = [
        'freelancer_id',
        'name',
        'price',
        'email',
        'phone',
    ];

    protected $visible = [
        'freelancer_id',
        'name',
        'price',
        'email',
        'phone',
    ];
}
