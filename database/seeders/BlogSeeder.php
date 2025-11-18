<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::insert([
            [
                'blog_image' => 'blog-1.jpg',
                'blog_title' => 'Top 5 Tips for Buying a Used Car in 2025',
                'blog_slug' => 'top-5-tips-for-buying-a-used-car-2025',
                'blog_description' => 'Buying a used car can save money, but requires proper inspection. In this guide, we discuss engine condition, body analysis, paperwork verification, mileage checking, and negotiation techniques to help you make the right purchase.',
                'author_name' => 'John Miller',
                'designation' => 'Automotive Expert',
                'facebook' => 'https://facebook.com/johnmiller',
                'instagram' => 'https://instagram.com/johnmiller',
                'youtube' => null,
                'whatsapp' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'blog_image' => 'blog-2.jpg',
                'blog_title' => 'Why Electric Cars Are Becoming More Popular',
                'blog_slug' => 'why-electric-cars-are-becoming-more-popular',
                'blog_description' => 'Electric vehicles are gaining popularity due to lower maintenance costs, eco-friendly performance, and advanced technology. This blog explores why EVs are the future of transportation and how they compare to traditional fuel cars.',
                'author_name' => 'Sarah Ahmed',
                'designation' => 'Tech Writer',
                'facebook' => 'https://facebook.com/sarahwrites',
                'instagram' => null,
                'youtube' => 'https://youtube.com/sarahreviews',
                'whatsapp' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'blog_image' => 'blog-3.jpg',
                'blog_title' => 'How to Check Car Engine Health Before Buying',
                'blog_slug' => 'how-to-check-car-engine-health-before-buying',
                'blog_description' => 'A car engine is the heart of the vehicle. This article explains step-by-step how to listen for abnormal sounds, inspect oil levels, check for leaks, and perform basic diagnostic checks to ensure the engine is in good condition.',
                'author_name' => 'David Chen',
                'designation' => 'Car Inspector',
                'facebook' => null,
                'instagram' => 'https://instagram.com/davidcarinspector',
                'youtube' => null,
                'whatsapp' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'blog_image' => 'blog-4.jpg',
                'blog_title' => 'SUV vs Sedan: Which One Should You Choose?',
                'blog_slug' => 'suv-vs-sedan-which-one-should-you-choose',
                'blog_description' => 'Choosing between an SUV and a Sedan depends on lifestyle, budget, and comfort preferences. This article compares space, fuel efficiency, performance, and long-term maintenance costs to help buyers make informed decisions.',
                'author_name' => 'Aisha Karim',
                'designation' => 'Content Creator',
                'facebook' => 'https://facebook.com/aishakarim',
                'instagram' => 'https://instagram.com/aishacarblog',
                'youtube' => null,
                'whatsapp' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'blog_image' => 'blog-5.jpg',
                'blog_title' => 'The Importance of Regular Car Maintenance',
                'blog_slug' => 'importance-of-regular-car-maintenance',
                'blog_description' => 'Regular maintenance helps increase car lifespan and prevents expensive repairs. Learn about oil changes, brake checkups, tire rotation, engine cleaning, and other essential maintenance routines that every car owner should follow.',
                'author_name' => 'Michael Brown',
                'designation' => 'Automotive Specialist',
                'facebook' => null,
                'instagram' => null,
                'youtube' => 'https://youtube.com/mbautoreviews',
                'whatsapp' => '017XXXXXXXX',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
