<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $table = 'localitys';
    protected $fillable = [
        'c_Locality',
        'description',
        'c_State'
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'c_State', 'c_State');
    }

    public function postalCode()
    {
        return $this->hasMany(PostalCode::class, 'c_Locality', 'c_Locality') -> where('c_State', $this->c_State);
    }

    public function user(){
        return $this->hasMany(User::class, 'c_Locality', 'c_Locality');
    }

}
