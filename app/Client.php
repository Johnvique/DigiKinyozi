<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =[
        'client_name',
        'client_mail',
        'client_phone',
        'client_location',
        'picture',
    ];
}
