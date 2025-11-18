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
                'carousel_subtitle' => 'Find Your Dream Car',
                'carousel_title' => 'Premium Cars at The Best Prices',
                'carousel_text' => 'Explore a wide range of luxury, sports, and family cars with trusted dealers.',
                'carousel_image' => 'carousel-1.png',
                'carousel_background' => 'bg-1.jpg',
                'carousel_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carousel_subtitle' => 'Certified Pre-Owned Cars',
                'carousel_title' => 'Quality You Can Trust',
                'carousel_text' => 'Every car is inspected, verified, and ready for smooth driving.',
                'carousel_image' => 'carousel-2.png',
                'carousel_background' => 'bg-2.jpg',
                'carousel_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carousel_subtitle' => 'Exclusive Deals',
                'carousel_title' => 'Save More on Your Next Car',
                'carousel_text' => 'Get the best offers, discounts, and financing options.',
                'carousel_image' => 'carousel-3.png',
                'carousel_background' => 'bg-3.jpg',
                'carousel_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carousel_subtitle' => 'Fast & Hassle-Free Process',
                'carousel_title' => 'Buy or Sell Cars Easily',
                'carousel_text' => 'We make car buying and selling smooth and stress-free.',
                'carousel_image' => 'carousel-4.png',
                'carousel_background' => 'bg-4.jpg',
                'carousel_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carousel_subtitle' => 'Latest Models Available',
                'carousel_title' => 'Choose From Top Brands',
                'carousel_text' => 'From Toyota to BMW — find cars from your favorite brands.',
                'carousel_image' => 'carousel-5.png',
                'carousel_background' => 'bg-5.jpg',
                'carousel_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
