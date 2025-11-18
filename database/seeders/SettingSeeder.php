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
            'company_name' => 'Car Live Auction',
            'email' => 'carliveauction@gmail.com',
            'phone' => '+8801979479720',
            'working_time' => 'Sat - Thu: 9:00 AM - 8:00 PM',
            'address' => '367,East Chowdhury Para,Rampura,DIT Road,Dhaka., Dhaka, Bangladesh',

            'map_link' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29216.091936364286!2d89.65980159999998!3d23.746969599999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5461f8a8aa7%3A0xa2034451ab7c79a4!2sCar%20Live%20Auction!5e0!3m2!1sen!2sbd!4v1762759289955!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

            'header_logo' => 'uploads/settings/logo.png',
            'footer_logo' => 'uploads/settings/logo.png',
            'common_bg' => 'uploads/settings/common-bg.jpg',
            'fav_icon' => 'uploads/settings/favicon.ico',
            'footer_text' => 'Footer description about the compnay',
            'color_scheme' => '#0BA6DF',

            // Footer + Socials
            'f_newsletter_text' => 'Subscribe to our newsletter for the latest car updates.',
            'facebook' => 'https://www.facebook.com/carliveauction',
            'instagram' => 'https://www.facebook.com/carliveauction',
            'youtube' => 'https://www.facebook.com/carliveauction',
            'linkedin' => 'https://www.facebook.com/carliveauction',

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
            'video_link' => 'https://youtu.be/3X_bQcmWw9w?si=u089GAU-7pO21AR-',

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
