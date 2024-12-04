<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    
    protected $fillable = [
        'c_Township',
        'description',
        'c_State'
    ];


    public function state()
    {
        return $this->belongsTo(State::class, 'c_State', 'c_State');
    }

    public function postalCode()
    {
        return $this->hasMany(PostalCode::class, 'c_Township', 'c_Township') -> where('c_State', $this->c_State);
    }
}
