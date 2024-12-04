<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    protected $table = 'postalCodes';

    protected $fillable = [
        'c_PostalCode',
        'c_State',
        'c_Township',
        'c_Locality',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'c_PostalCode', 'c_PostalCode');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'c_PostalCode', 'c_PostalCode');
    }

    public function colony ()
    {
        return $this->hasMany(Colony::class, 'c_PostalCode', 'c_PostalCode');
    }

    public function States(){
        return $this->hasMany(State::class, 'c_State', 'c_State');
    }

    public function townships(){
        return $this->hasMany(Township::class, 'c_Township', 'c_Township') -> where('c_State', $this->c_State);
    } 

    public function localities(){
        return $this->hasMany(Locality::class) -> where('c_State', $this->c_State);
    }

    public function country()
    {
        return $this-> hasManyThrough(Country::class, State::class);
    }
}
