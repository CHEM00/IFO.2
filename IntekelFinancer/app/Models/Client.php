<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = [
        //data personal
        'name',
        'email',
        'phone',
        'rfc',
        //data address
        'address',
        'exterior_number',
        'interior_number',
        'postal_code',
        'country_code',
        'state_code',
        'locality_code',
        'township_code',
        'colony_name',
        //data fiscal
        'cfdi_id',
        'tax_regime_id',
        'payment_method_id',
        'payment_type_id',
        'bank',
        'credit_day',
        'clabe',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Eloquent of the address
    public function postalCode()
    {
        return $this->belongsTo(PostalCode::class, 'postal_code', 'postal_code');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_code', 'state_code');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'country_code');
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'locality_code', 'locality_code')
            ->where('state_code', $this->state_code);
    }

    public function township()
    {
        return $this->belongsTo(Township::class, 'township_code', 'township_code')
            ->where('state_code', $this->state_code);
    }

    public function colony()
    {
        return $this->belongsTo(Colony::class, 'colony_name', 'colony_name')
            ->where('postal_code', $this->postal_code);
    }
    //__________________________________________________________________________________
    //Eloquent of the fiscal data
    public function cfdi()
    {
        return $this->belongsTo(Cfdi::class, 'cfdi_id', 'id');
    }

    public function taxRegime()
    {
        return $this->belongsTo(TaxRegime::class, 'tax_regime_id', 'id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id', 'id');
    }
    //__________________________________________________________________________________
    //Eloquent of the bank data
}
