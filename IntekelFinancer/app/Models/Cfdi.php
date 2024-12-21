<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cfdi extends Model
{
    protected $table = 'cfdis';
    protected $fillable = ['cfdi_code','cfdi_description', 'physical_person', 'moral_person', 'receiving_tax_regime'];

    public function user(){
        return $this->hasMany (User::class);
    }
}
