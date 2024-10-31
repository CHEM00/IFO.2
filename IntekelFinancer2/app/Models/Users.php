<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $fillable = [
        'email',
        'password',
        'qb_token',
        'social_reason',
        'address',
        'phone',
        'city',
        'state',
        'country',
        'postal_code',
        'rfc',
        'sat_key',
        'sat_cer'
    ];
    protected $hidden = [
        'password',
        'qb_token'
    ];
    public $timestamps = false;
}
