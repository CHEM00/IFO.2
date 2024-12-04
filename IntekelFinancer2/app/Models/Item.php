<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'description',
        'value_unit',
        'tax_rate',
        'unit_measure',
        'c_ProdServ'
    ];

    public function zipItem()
    {
        return $this->belongsTo(ZipItem::class, 'c_ProdServ', 'c_ProdServ');
    }
}
