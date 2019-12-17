<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable =[
        'artist_name',
        'artist_phone',
        'artist_role',
        'artist_image',
    ];
}
