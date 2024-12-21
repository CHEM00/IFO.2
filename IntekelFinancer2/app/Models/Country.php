<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countrys';
    protected $fillable = [
        'c_Country',
        'description'
    ];

    public function state()
    {
        return $this->hasMany(State::class, 'c_Country', 'c_Country');
    }

    public function user(){
        return $this->hasMany(User::class, 'c_Country', 'c_Country');
    }
}
