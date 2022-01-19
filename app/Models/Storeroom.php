<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storeroom extends Model
{
    use HasFactory;

    protected $table = "storeroom";

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'unit_id',
        'isPurchased',
        'isConsumed',
        'isFavourite',
        'expiry_date'
    ];

    public function owner(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function unit(){
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }
}