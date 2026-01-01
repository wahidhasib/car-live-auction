<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carousel::insert([
            [
                'carousel_image' => 'carousel-1.png',
                'carousel_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carousel_image' => 'carousel-2.png',
                'carousel_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
