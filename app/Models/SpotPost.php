<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpotPost extends Model
{
    //
    protected $fillable = [
        'user_id',
        'spotTitle',
        'spotDesc',
        'imag_url',
        'latitude',
        'longitude',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
