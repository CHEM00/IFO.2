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
        'rfc',
        'hour_zone',
        'address',
        'phone',
        'logo',

        'c_PostalCode',
        'c_Colony',
        'c_TaxRegime',
        'c_State',
        'c_Township',
        'c_Locality',
        'c_Country',
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
        return $this->belongsTo(PostalCode::class, 'c_PostalCode', 'c_PostalCode');
    }

    public function tax_regimes(){
        return $this->belongsTo(TaxRegime::class, 'c_TaxRegime', 'c_TaxRegime');
    }

    public function states(){
        return $this->belongsTo(State::class, 'c_State', 'c_State');
    }

    public function townships(){
        return $this->belongsTo(Township::class, 'c_Township', 'c_Township');
    }

    public function localities(){
        return $this->belongsTo(Locality::class, 'c_Locality', 'c_Locality');
    }

    public function countries(){
        return $this->belongsTo(Country::class, 'c_Country', 'c_Country');
    }

    public function colony(){
        return $this->belongsTo(Colony::class, 'c_Colony', 'c_Colony');
    }
}
