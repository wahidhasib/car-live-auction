<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::insert([
            [
                'name' => 'John Miller',
                'designation' => 'Customer',
                'image' => 'john.png',
                'comment' => 'Amazing service! The process was smooth and the team was very helpful. Highly recommended.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sophia Rahman',
                'designation' => 'Car Buyer',
                'image' => 'sophia.png',
                'comment' => 'Great experience! Found the perfect car within my budget. Very satisfied.',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Chen',
                'designation' => 'Verified Customer',
                'image' => 'david.png',
                'comment' => 'Professional and friendly team. The car was exactly as described. Would definitely return.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aisha Karim',
                'designation' => 'Client',
                'image' => 'aisha.png',
                'comment' => 'Loved the customer support. They answered all my questions quickly and clearly.',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Brown',
                'designation' => 'Car Owner',
                'image' => 'michael.png',
                'comment' => 'Very trustworthy service. I bought my first car through them, and everything went flawlessly.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
