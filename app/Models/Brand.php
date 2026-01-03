<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'brand_title',
        'brand_logo'
    ];

    public function models()
    {
        return $this->hasMany(CarModel::class);
    }
}
