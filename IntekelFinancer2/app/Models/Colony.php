<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colony extends Model
{
    protected $fillable = [
        'c_Colony',
        'c_PostalCode',
        'settlementName'
    ];

    public function postalCode()
    {
        return $this->belongsTo(PostalCode::class, 'c_PostalCode');
    }

}
