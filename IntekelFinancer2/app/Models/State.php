<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'c_State',
        'stateName',
        'c_Country'
    ];

    public function postalCode()
    {
        return $this->hasMany(PostalCode::class, 'c_State', 'c_State');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'c_Country', 'c_Country');
    }

    public function township()
    {
        return $this->hasMany(Township::class, 'c_State', 'c_State');
    }

    public function locality()
    {
        return $this->hasMany(Locality::class, 'c_State', 'c_State');
    }

    public function user(){
        return $this->hasMany(User::class, 'c_State', 'c_State');
    }
}
