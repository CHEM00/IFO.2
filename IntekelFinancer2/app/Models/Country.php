<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'c_Country',
        'description'
    ];

    public function state()
    {
        return $this->hasMany(State::class, 'c_Country', 'c_Country');
    }
}
