<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cfdi extends Model
{
    protected $fillable = [
        'c_Cfdi',
        'description',
        'physics',
        'moral',
        'receiving_TaxRegime'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'c_Cfdi', 'c_Cfdi');
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'c_Cfdi', 'c_Cfdi');
    }
}
