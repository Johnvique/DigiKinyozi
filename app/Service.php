<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable =[
        'services_name',
        'services_price',
        'gender',
    ];
}
