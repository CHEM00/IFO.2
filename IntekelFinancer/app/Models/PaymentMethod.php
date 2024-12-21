<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';
    protected $fillable = ['payment_method_code','payment_method_description'];

    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
