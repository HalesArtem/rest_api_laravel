<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';

    protected $fillable = [
        'order_id',
        'description',
        'customer_id',
        'application_id',
    ];

    protected $visible = [
        'order_id',
        'description'
    ];
}
