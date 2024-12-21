<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxRegime extends Model
{
    protected $table = 'taxregimes';
    protected $fillable = [
        'c_TaxRegime',
        'description',
        'physics',
        'moral'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'c_TaxRegime', 'c_TaxRegime');
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'c_TaxRegime', 'c_TaxRegime');
    }
}
