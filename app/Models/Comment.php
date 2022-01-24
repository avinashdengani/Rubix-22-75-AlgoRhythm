<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
