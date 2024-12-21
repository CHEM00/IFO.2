<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //Personal data
        'social_reason',
        'email',
        'password',
        'phone',
        'rfc',
        'logo',

        //Data tokens
        'qb_token',
        'qb_refresh_token',
        'remember_token',
        'hour_zone',

        //Data address
        'postal_code',
        'colony_name',
        'township_code',
        'state_code',
        'locality_code',
        'country_code',
        'address',

        //Data tax regime
        'tax_regime_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function postalCode()
    {
        return $this->belongsTo(PostalCode::class, 'postal_code', 'postal_code');
    }

    public function colony()
    {
        return $this->belongsTo(Colony::class, 'colony_name', 'colony_name')
                    ->where('postal_code', $this->postal_code);
    }

    public function township()
    {
        return $this->belongsTo(Township::class, 'township_code', 'township_code')
                    ->where('state_code', $this->state_code);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_code', 'state_code');
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'locality_code', 'locality_code')
                    ->where('state_code', $this->state_code);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'country_code');
    }

    public function taxRegime()
    {
        return $this->belongsTo(TaxRegime::class, 'tax_regime_id');
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }

}
