<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'company_name' => 'Car Auction BD',
            'email' => 'info@carauctionbd.com',
            'phone' => '+8801712345678',
            'working_time' => 'Mon - Sat: 9:00 AM - 8:00 PM',
            'footer_text' => '© 2025 Car Auction BD. All rights reserved.',
            'address' => 'House 12, Road 5, Banani, Dhaka, Bangladesh',
            'map_link' => 'https://goo.gl/maps/xyz12345',
            'header_logo' => 'uploads/settings/logo.png',
            'footer_logo' => 'uploads/settings/logo.png',
            'common_bg' => 'uploads/settings/common-bg.jpg',
            'fav_icon' => 'uploads/settings/favicon.ico',

            // Footer + Socials
            'f_newsletter_text' => 'Subscribe to our newsletter for the latest car updates.',
            'facebook' => 'https://facebook.com/carauctionbd',
            'instagram' => 'https://instagram.com/carauctionbd',
            'youtube' => 'https://youtube.com/@carauctionbd',
            'linkedin' => 'https://linkedin.com/company/carauctionbd',

            // SEO
            'meta_title' => 'Car Auction BD - Buy and Sell Cars Online',
            'meta_description' => 'Car Auction BD is Bangladesh’s best car auction platform. Buy and sell cars easily and securely.',
            'meta_keywords' => 'car, auction, bangladesh, buy, sell, vehicles, auto',

            // About Section
            'about_image' => 'uploads/settings/about.jpg',
            'about_subtitle' => 'Who We Are',
            'about_title' => 'The Best Car Auction Platform in Bangladesh',
            'about_message' => 'We provide a transparent and easy car buying and selling experience.',
            'about_text' => 'With years of experience in the automotive industry, we connect buyers and sellers seamlessly.',
            'about_btn_text' => 'Learn More',

            // Counter Section
            'count_cars' => '1200',
            'count_clients' => '850',
            'count_workers' => '25',
            'count_experience' => '10',

            // Latest Cars
            'latest_car_subtitle' => 'Our Latest Arrivals',
            'latest_car_title' => 'Find the Perfect Car for You',

            // Category Section
            'category_subtitle' => 'Browse by Category',
            'category_title' => 'Explore Car Types',

            // Banner Section
            'banner_background' => 'uploads/settings/banner-bg.jpg',
            'video_link' => 'https://www.youtube.com/watch?v=abcd1234',

            // Service Section
            'service_subtitle' => 'Our Services',
            'service_title' => 'What We Offer',
            'service_text' => 'We offer car auctions, inspections, and easy financing solutions.',
            'service_image' => 'uploads/settings/service.jpg',

            'service_quality_title' => 'Top Quality Cars',
            'service_quality_text' => 'All our listed cars go through rigorous quality checks.',

            'service_mechanic_title' => 'Expert Mechanics',
            'service_mechanic_text' => 'Our certified mechanics inspect every car before listing.',

            'service_brand_title' => 'Trusted Brands',
            'service_brand_text' => 'We partner with the most reliable car brands in Bangladesh.',

            'service_price_title' => 'Affordable Prices',
            'service_price_text' => 'Get the best deals and auction prices on quality cars.',

            // Testimonial Section
            'testimonial_subtitle' => 'What Our Clients Say',
            'testimonial_title' => 'Customer Testimonials',

            // Brand Section
            'brand_subtitle' => 'Our Partners',
            'brand_title' => 'Brands We Work With',

            // Contact Section
            'contact_image' => 'uploads/settings/contact.jpg',
            'form_title' => 'Get in Touch',
            'form_text' => 'Fill out the form below and we’ll get back to you soon.',

            // Blog Section
            'blog_title' => 'Latest News & Articles',
            'blog_subtitle' => 'Stay Updated with Our Blog',
        ]);
    }
}
