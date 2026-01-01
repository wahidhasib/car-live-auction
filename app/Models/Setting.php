<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public function imageUrl($imagePath, $fallback = 'frontend/img/slider/hero-1.png')
    {
        if ($imagePath && file_exists(public_path('storage/' . $imagePath))) {
            return asset('storage/' . $imagePath);
        }

        return asset($fallback);
    }

    public function getHeaderLogoUrlAttribute()
    {
        return $this->imageUrl($this->header_logo);
    }
}
