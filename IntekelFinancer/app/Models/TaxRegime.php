<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxRegime extends Model
{
    protected $table = 'tax_regimes';
    protected $fillable = ['id','tax_regime_code','tax_regime_description', 'physical_person', 'moral_person'];

    public function user(){
        return $this->hasMany (User::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }
}
