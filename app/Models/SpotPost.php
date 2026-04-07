<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class SpotPost extends Model
{
    use HasApiTokens;
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
