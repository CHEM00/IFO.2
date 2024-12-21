<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    protected $table = 'postal_codes';
    public $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['postal_code','locality_code','township_code', 'state_code'];

    public function locality(){
        return $this->belongsTo (Locality::class, 'locality_code', 'locality_code')
                    ->where('state_code', $this->state_code);
    }
    public function township(){
        return $this->belongsTo (Township::class, 'township_code', 'township_code')
                    ->where('state_code', $this->state_code);
    }
    public function state(){
        return $this->belongsTo (State::class, 'state_code', 'state_code');
    }
    public function user(){
        return $this->hasMany (User::class, 'postal_code', 'postal_code');
    }

    public function colony(){
        return $this->hasMany (Colony::class, 'postal_code', 'postal_code');
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'postal_code', 'postal_code');
    }
}
