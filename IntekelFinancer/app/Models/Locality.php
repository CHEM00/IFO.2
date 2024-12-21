<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $table = 'localities';
    protected $fillable = ['locality_code','locality_name','state_code'];

    public function state(){
        return $this->belongsTo (State::class, 'state_code', 'state_code');
    }
    public function postalCode(){
        return $this->hasMany (PostalCode::class, 'locality_code', 'locality_code')
            ->where('state_code', $this->state_code);
    }
    public function user(){
        return $this->hasMany (User::class, 'locality_code', 'locality_code')
            ->where('state_code', $this->state_code);
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'locality_code', 'locality_code')
            ->where('state_code', $this->state_code);
    }
}
