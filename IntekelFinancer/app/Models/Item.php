<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['description','unit_value','tax_rate','unit_measure','zip_item_id', 'user_id'];

    public function zipItem(){
        return $this->belongsTo (ZipItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
