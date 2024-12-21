<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colony extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'colonies';
    protected $fillable = ['colony_code','colony_name','postal_code'];

    public function postalCode(){
        return $this->belongsTo (PostalCode::class, 'postal_code', 'postal_code');
    }
    public function user(){
        return $this->hasMany(User::class, 'colony_name', 'colony_name')
                ->where('postal_code', $this->postal_code);
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'colony_name', 'colony_name')
                ->where('postal_code', $this->postal_code);
    }
}
