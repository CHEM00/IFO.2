<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use item;

class ZipItem extends Model
{
    protected $fillable = [
        'c_ProdServ',
        'descripcion',
        'ivaTraslado',
        'iepsTraslado',
        'complemento',
        'estimuloFranjaFronteriza',
        'palabrasSimilares'
    ];

    public function item()
    {
        return $this->hasMany(item::class, 'c_ProdServ', 'c_ProdServ');
    }
}
