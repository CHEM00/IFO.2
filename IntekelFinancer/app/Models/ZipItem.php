<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZipItem extends Model
{
    protected $table = 'zip_items';
    protected $fillable = ['product_service_code','description','similar_words'];

    public function item(){
        return $this->hasmany (Item::class);
    }
}
