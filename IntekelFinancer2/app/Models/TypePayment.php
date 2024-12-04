<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePayment extends Model
{
    protected $fillable = [
        'c_TypePayment',
        'description',
        'banked',
        'operationNum',
        'emisorRfc',
        'orderAccount',
        'template_patyingAccount',
        'rfcIssuer_BeneficiaryAccount',
        'beneficiaryAccount',
        'template_BeneficiaryAccount',
        'type_PayChain',
        'nameIssuingBankOriginating'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'c_TypePayment', 'c_TypePayment');
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'c_TypePayment', 'c_TypePayment');
    }
}
