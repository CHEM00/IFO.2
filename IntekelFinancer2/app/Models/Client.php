<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'rfc',
        'phone',
        'address',
        'exterior_number',
        'interior_number',
        'c_Locality',
        'c_Township',
        'c_State',
        'c_Country',
        'credit_days',
        'bank',
        'clabe',
        'c_PostalCode',
        'c_TaxRegime',
        'c_MethodPayment',
        'c_TypePayment',
        'c_Cfdi',
        'c_Colony',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postalCode()
    {
        return $this->belongsTo(PostalCode::class, 'c_PostalCode', 'c_PostalCode');
    }

    public function taxRegime()
    {
        return $this->belongsTo(TaxRegime::class, 'c_TaxRegime', 'c_TaxRegime');
    }

    public function methodPayment()
    {
        return $this->belongsTo(MethodPayment::class, 'c_MethodPayment', 'c_MethodPayment');
    }

    public function typePayment()
    {
        return $this->belongsTo(TypePayment::class, 'c_TypePayment', 'c_TypePayment');
    }

    public function cfdi()
    {
        return $this->belongsTo(Cfdi::class, 'c_Cfdi');
    }

}
