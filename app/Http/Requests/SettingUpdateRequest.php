<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // General Info
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'working_time' => 'required|string|max:255',
            'footer_text' => 'required|string',
            'address' => 'required|string|max:255',
            'map_link' => 'required|string',
            'header_logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'common_bg' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'fav_icon' => 'nullable|image|mimes:jpg,jpeg,png,ico|max:1024',
            'color_scheme' => 'required|string',

            // Footer + Socials
            'f_newsletter_text' => 'required|string|max:255',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'linkedin' => 'nullable|url',

            // SEO
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',

            // About Section
            'about_image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'about_subtitle' => 'required|string|max:255',
            'about_title' => 'required|string|max:255',
            'about_message' => 'required|string|max:500',
            'about_text' => 'required|string|max:255',
            'about_btn_text' => 'required|string|max:100',

            // Counter Section
            'count_cars' => 'required|numeric|min:0',
            'count_clients' => 'required|numeric|min:0',
            'count_workers' => 'required|numeric|min:0',
            'count_experience' => 'required|numeric|min:0',

            // Latest Cars
            'latest_car_subtitle' => 'required|string|max:255',
            'latest_car_title' => 'required|string|max:255',

            // Category Section
            'category_subtitle' => 'required|string|max:255',
            'category_title' => 'required|string|max:255',

            // Banner Section
            'banner_background' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'video_link' => 'required|url',

            // Service Section
            'service_subtitle' => 'required|string|max:255',
            'service_title' => 'required|string|max:255',
            'service_text' => 'required|string',
            'service_image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',

            'service_quality_title' => 'required|string|max:255',
            'service_quality_text' => 'required|string|max:500',

            'service_mechanic_title' => 'required|string|max:255',
            'service_mechanic_text' => 'required|string|max:500',

            'service_brand_title' => 'required|string|max:255',
            'service_brand_text' => 'required|string|max:500',

            'service_price_title' => 'required|string|max:255',
            'service_price_text' => 'required|string|max:500',

            // Testimonial Section
            'testimonial_subtitle' => 'required|string|max:255',
            'testimonial_title' => 'required|string|max:255',

            // Brand Section
            'brand_subtitle' => 'required|string|max:255',
            'brand_title' => 'required|string|max:255',

            // Contact Section
            'contact_image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'form_title' => 'required|string|max:255',
            'form_text' => 'required|string|max:255',

            // Blog Section
            'blog_title' => 'required|string|max:255',
            'blog_subtitle' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            // 🔹 General Info
            'company_name.required' => 'Please enter your company name.',
            'company_name.max' => 'Company name must not exceed 255 characters.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email address must not exceed 255 characters.',

            'phone.required' => 'Phone number is required.',
            'phone.max' => 'Phone number must not exceed 20 characters.',

            'working_time.required' => 'Working hours are required.',
            'footer_text.required' => 'Footer text cannot be empty.',

            'address.required' => 'Address is required.',
            'address.max' => 'Address must not exceed 255 characters.',

            'map_link.required' => 'Please provide a valid map link.',
            'map_link.url' => 'Map link must be a valid URL.',

            'header_logo.image' => 'Header logo must be an image file.',
            'header_logo.mimes' => 'Header logo must be a JPG, JPEG, PNG, or SVG file.',
            'header_logo.max' => 'Header logo must not exceed 2MB.',

            'footer_logo.image' => 'Footer logo must be an image file.',
            'footer_logo.mimes' => 'Footer logo must be a JPG, JPEG, PNG, or SVG file.',
            'footer_logo.max' => 'Footer logo must not exceed 2MB.',

            'common_bg.image' => 'Common background must be an image file.',
            'common_bg.mimes' => 'Common background must be a JPG, JPEG, PNG, or SVG file.',
            'common_bg.max' => 'Common background must not exceed 2MB.',

            'fav_icon.image' => 'Favicon must be an image file.',
            'fav_icon.mimes' => 'Favicon must be a JPG, JPEG, PNG, or ICO file.',
            'fav_icon.max' => 'Favicon must not exceed 1MB.',


            // 🔹 Footer + Socials
            'f_newsletter_text.required' => 'Newsletter text is required.',
            'facebook.url' => 'Facebook URL must be a valid link.',
            'instagram.url' => 'Instagram URL must be a valid link.',
            'youtube.url' => 'YouTube URL must be a valid link.',
            'linkedin.url' => 'LinkedIn URL must be a valid link.',


            // 🔹 SEO
            'meta_title.required' => 'Meta title is required for SEO.',
            'meta_description.required' => 'Meta description is required.',
            'meta_keywords.required' => 'Meta keywords are required.',


            // 🔹 About Section
            'about_image.image' => 'About image must be an image file.',
            'about_image.mimes' => 'About image must be a JPG, JPEG, PNG, or SVG file.',
            'about_image.max' => 'About image must not exceed 2MB.',

            'about_subtitle.required' => 'About subtitle is required.',
            'about_title.required' => 'About title is required.',
            'about_message.required' => 'About message cannot be empty.',
            'about_text.required' => 'About text cannot be empty.',
            'about_btn_text.required' => 'About button text is required.',


            // 🔹 Counter Section
            'count_cars.required' => 'Car count is required.',
            'count_cars.numeric' => 'Car count must be a number.',
            'count_clients.required' => 'Client count is required.',
            'count_clients.numeric' => 'Client count must be a number.',
            'count_workers.required' => 'Worker count is required.',
            'count_workers.numeric' => 'Worker count must be a number.',
            'count_experience.required' => 'Experience count is required.',
            'count_experience.numeric' => 'Experience count must be a number.',


            // 🔹 Latest Cars
            'latest_car_subtitle.required' => 'Latest car subtitle is required.',
            'latest_car_title.required' => 'Latest car title is required.',


            // 🔹 Category Section
            'category_subtitle.required' => 'Category subtitle is required.',
            'category_title.required' => 'Category title is required.',


            // 🔹 Banner Section
            'banner_background.image' => 'Banner background must be an image file.',
            'banner_background.mimes' => 'Banner background must be a JPG, JPEG, PNG, or SVG file.',
            'banner_background.max' => 'Banner background must not exceed 2MB.',

            'video_link.required' => 'Video link is required.',
            'video_link.url' => 'Video link must be a valid URL.',


            // 🔹 Service Section
            'service_subtitle.required' => 'Service subtitle is required.',
            'service_title.required' => 'Service title is required.',
            'service_text.required' => 'Service text cannot be empty.',

            'service_image.image' => 'Service image must be an image file.',
            'service_image.mimes' => 'Service image must be a JPG, JPEG, PNG, or SVG file.',
            'service_image.max' => 'Service image must not exceed 2MB.',

            'service_quality_title.required' => 'Service quality title is required.',
            'service_quality_text.required' => 'Service quality description is required.',

            'service_mechanic_title.required' => 'Service mechanic title is required.',
            'service_mechanic_text.required' => 'Service mechanic description is required.',

            'service_brand_title.required' => 'Service brand title is required.',
            'service_brand_text.required' => 'Service brand description is required.',

            'service_price_title.required' => 'Service price title is required.',
            'service_price_text.required' => 'Service price description is required.',


            // 🔹 Testimonial Section
            'testimonial_subtitle.required' => 'Testimonial subtitle is required.',
            'testimonial_title.required' => 'Testimonial title is required.',


            // 🔹 Brand Section
            'brand_subtitle.required' => 'Brand subtitle is required.',
            'brand_title.required' => 'Brand title is required.',


            // 🔹 Contact Section
            'contact_image.image' => 'Contact image must be an image file.',
            'contact_image.mimes' => 'Contact image must be a JPG, JPEG, PNG, or SVG file.',
            'contact_image.max' => 'Contact image must not exceed 2MB.',

            'form_title.required' => 'Form title is required.',
            'form_text.required' => 'Form text is required.',


            // 🔹 Blog Section
            'blog_title.required' => 'Blog title is required.',
            'blog_subtitle.required' => 'Blog subtitle is required.',
        ];
    }
}
