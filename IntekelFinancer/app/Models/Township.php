<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $table = 'townships';
    protected $fillable = ['township_code','township_name','state_code'];

    public function state(){
        return $this->belongsTo (State::class, 'state_code', 'state_code');
    }
    public function postalCode(){
        return $this->hasMany (PostalCode::class, 'township_code', 'township_code')
                    ->where('state_code', $this->state_code);
    }
    public function user(){
        return $this->hasMany (User::class, 'township_code', 'township_code')
                    ->where('state_code', $this->state_code);
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'township_code', 'township_code')
                    ->where('state_code', $this->state_code);
    }
}
