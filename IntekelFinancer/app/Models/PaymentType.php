<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = 'payment_methods';
    protected $fillable = [
        'payment_type_code',
        'payment_type_description',
        'banked','operation_number',
        'transmitter_rfc',
        'order_account',
        'template_patying_account',
        'rfc_issuer_beneficiary_account',
        'beneficiary_account',
        'template_beneficiary_account',
        'type_pay_chain',
        'name_issuing_bank_originating'];

    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
