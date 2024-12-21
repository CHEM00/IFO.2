<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $fillable = ['state_code','state_name','country_id'];

    public function country(){
        return $this->belongsTo (Country::class, 'country_code', 'country_code');
    }
    public function user(){
        return $this->hasMany (User::class, 'state_code', 'state_code');
    }
    public function localities(){
        return $this->hasMany (Locality::class, 'state_code', 'state_code');
    }
    public function township(){
        return $this->hasMany (Township::class, 'state_code', 'state_code');
    }
    public function PostalCode(){
        return $this->hasMany (PostalCode::class, 'state_code', 'state_code');
    }
    public function client()
    {
        return $this->hasMany(Client::class, 'state_code', 'state_code');
    }
}
