<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'tax_regime',
        'email',
        'rfc',
        'phone',
        'address',
        'township',
        'state',
        'postal_code',
        'country',
        'payment_type',
        'method_payment',
        'cdfi',
        'credit_days',
        'bank',
        'clabe',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
