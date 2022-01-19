<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    const PURCHASED = 1;
    const NOT_PURCHASED = 0;

    const FAVOURITE = 1;
    const NOT_FAVOURITE = 0;


    // SCOPES
    public function scopeIsNotPurchased($query)
    {
        return $query->where('isPurchased', self::NOT_PURCHASED);
    }
    public function scopeIsPurchased($query)
    {
        return $query->where('isPurchased', self::PURCHASED);
    }

    public function scopeIsNotFavourite($query)
    {
        return $query->where('isFavourite', self::NOT_FAVOURITE);
    }
    public function scopeIsFavourite($query)
    {
        return $query->where('isFavourite', self::FAVOURITE);
    }

    // RELATIONSHIPS

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function owner()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}