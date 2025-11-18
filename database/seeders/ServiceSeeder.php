<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            [
                'service_title' => 'Car Buying Assistance',
                'service_slug' => 'car-buying-assistance',
                'meta_title' => 'Car Buying Assistance Service',
                'meta_description' => 'Professional help to buy your perfect car at the best price.',
                'meta_keywords' => 'car buying, car dealer, car assistance',
                'service_image' => 'car-buying.png',
                'service_text' => 'We help you choose the right car based on your needs and budget.',
                'service_icon' => '<i class="fa-solid fa-car"></i>',
                'service_description' => 'Our car buying assistance service ensures you get the right vehicle with expert guidance, full inspection, pricing support, and smooth documentation. We compare models, negotiate prices, and verify car conditions so you get the best value.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_title' => 'Car Selling Service',
                'service_slug' => 'car-selling-service',
                'meta_title' => 'Sell Your Car Easily',
                'meta_description' => 'Fast and secure process to sell your used car.',
                'meta_keywords' => 'sell car, car dealer, used cars',
                'service_image' => 'car-selling.png',
                'service_text' => 'Sell your car with a fast, hassle-free process.',
                'service_icon' => '<i class="fa-solid fa-tags"></i>',
                'service_description' => 'We help you sell your car quickly with proper market evaluation, high-quality photos, advertising exposure, and verified buyers. Our team handles price negotiation and paperwork for a stress-free experience.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_title' => 'Car Inspection & Verification',
                'service_slug' => 'car-inspection-verification',
                'meta_title' => 'Car Inspection Service',
                'meta_description' => 'Full car inspection and verification service for buyers.',
                'meta_keywords' => 'car inspection, verification, car check',
                'service_image' => 'inspection.png',
                'service_text' => 'Get your car fully inspected before buying.',
                'service_icon' => '<i class="fa-solid fa-check-circle"></i>',
                'service_description' => 'Our experts inspect the engine, body condition, mileage, computer diagnosis, accident history, and overall performance. We ensure the car you buy is 100% authentic and worth the price.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_title' => 'Car Loan & Finance Support',
                'service_slug' => 'car-loan-finance-support',
                'meta_title' => 'Car Loan Assistance',
                'meta_description' => 'Get help with car financing and bank loan processing.',
                'meta_keywords' => 'car loan, finance support, car dealer',
                'service_image' => 'loan-support.png',
                'service_text' => 'We guide you through loan options to buy your dream car.',
                'service_icon' => '<i class="fa-solid fa-file-invoice-dollar"></i>',
                'service_description' => 'We assist in choosing the best car loan, preparing documents, applying through trusted banks, and securing low-interest financing. Our team simplifies the entire process for you.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_title' => 'After-Sales Service & Support',
                'service_slug' => 'after-sales-support',
                'meta_title' => 'After Sales Support',
                'meta_description' => 'Full support even after you purchase your car.',
                'meta_keywords' => 'after sales, car service, customer support',
                'service_image' => 'after-sales.png',
                'service_text' => 'We stay connected even after your purchase.',
                'service_icon' => '<i class="fa-solid fa-headset"></i>',
                'service_description' => 'Our after-sales support includes maintenance scheduling, repair recommendations, document renewals, insurance reminders, and customer assistance. We ensure your ownership experience stays smooth.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
