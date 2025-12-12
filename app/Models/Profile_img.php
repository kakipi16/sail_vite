<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile_img extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
    ];
}
