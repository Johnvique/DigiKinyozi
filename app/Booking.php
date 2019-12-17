<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable =[
        'clin_name',
        'book_date',
        'service_booked',
        'book_time',
        'customer_phone',
        'customer_mail',
        'message',
    ];
}
