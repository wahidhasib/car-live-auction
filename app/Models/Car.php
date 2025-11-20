<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'body_type');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
