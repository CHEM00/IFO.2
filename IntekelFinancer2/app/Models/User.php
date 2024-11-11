<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmailContract  
{
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'users';
    protected $fillable = [
        'email',
        'password',
        'qb_token',
        'qb_refresh_token',
        'email_verified_at',
        'social_reason',
        'address',
        'phone',
        'city',
        'state',
        'country',
        'postal_code',
        'rfc',
        'sat_key',
        'sat_cer',
        'role'
    ];
    protected $hidden = [
        'password',
        'qb_token'
    ];
}
