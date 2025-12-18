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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->integer('rating');
            $table->longText('description');
            $table->bigInteger('price');
            $table->foreignId('body_type')->references('id')->on('categories')->cascadeOnDelete();
            $table->integer('condition');
            $table->string('milage');
            $table->string('transmission');
            $table->string('year');
            $table->string('fuel_type');
            $table->string('color');
            $table->integer('doors');
            $table->integer('cylenders');
            $table->integer('engine');
            $table->string('vin_number')->unique()->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
