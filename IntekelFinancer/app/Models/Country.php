<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $keyType = 'string';
    protected $fillable = ['country_code','country_name'];

    public function states(){
        return $this->hasMany (State::class, 'country_code', 'country_code');
    }
    public function user(){
        return $this->hasMany (User::class, 'country_code', 'country_code');
    }

    public function clients(){
        return $this->hasMany (Client::class, 'country_code', 'country_code');
    }
}
