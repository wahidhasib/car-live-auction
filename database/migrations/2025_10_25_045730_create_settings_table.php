<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email');
            $table->string('phone');
            $table->string('working_time');
            $table->text('footer_text');
            $table->string('address');
            $table->text('map_link');
            $table->string('header_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('common_bg')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('color_scheme')->nullable();

            $table->string('f_newsletter_text');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');

            // about
            $table->string('about_image')->nullable();
            $table->string('about_subtitle');
            $table->string('about_title');
            $table->string('about_message');
            $table->string('about_text');
            $table->string('about_btn_text');

            // counter section
            $table->string('count_cars');
            $table->string('count_clients');
            $table->string('count_workers');
            $table->string('count_experience');

            // latest cars
            $table->string('latest_car_subtitle');
            $table->string('latest_car_title');

            // category section
            $table->string('category_subtitle');
            $table->string('category_title');

            // banner section
            $table->string('banner_background');
            $table->string('video_link');

            // service section
            $table->string('service_subtitle');
            $table->string('service_title');
            $table->text('service_text');
            $table->string('service_image')->nullable();

            $table->string('service_quality_title');
            $table->string('service_quality_text');

            $table->string('service_mechanic_title');
            $table->string('service_mechanic_text');

            $table->string('service_brand_title');
            $table->string('service_brand_text');

            $table->string('service_price_title');
            $table->string('service_price_text');

            // testimonial
            $table->string('testimonial_subtitle');
            $table->string('testimonial_title');

            // Brands
            $table->string('brand_subtitle');
            $table->string('brand_title');

            // contact
            $table->string('contact_image')->nullable();
            $table->string('form_title');
            $table->string('form_text');

            // blog
            $table->string('blog_title');
            $table->string('blog_subtitle');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
