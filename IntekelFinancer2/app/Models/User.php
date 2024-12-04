<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'email',
        'password',
        'qb_token',
        'qb_refresh_token',
        'social_reason',
        'tax_regime',
        'rfc',
        'hour_zone',
        'postal_code',
        'township',
        'state',
        'country',
        'address',
        'phone',
        'logo',
    ];
    protected $hidden = [
        'password',
        'qb_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function postal_codes(){
        return $this->hasOne(PostalCode::class, 'c_PostalCode', 'c_PostalCode');
    }

    public function tax_regimes(){
        return $this->hasOne(TaxRegime::class, 'c_TaxRegime', 'c_TaxRegime');
    }

}
