<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarUpdateRequest extends FormRequest
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
            'name'            => 'required|string|max:255',
            'brand_id'        => 'required|exists:brands,id',
            'rating'          => 'required|integer|min:1|max:5',
            'description'     => 'required|string|min:20',
            'price'           => 'required|numeric|min:0',

            'body_type'       => 'required|exists:categories,id',
            'condition'       => 'required|string|in:1,2,3',

            'milage'          => 'required|string|max:50',
            'transmission'    => 'required|string|in:Automatic,Manual,Hybrid',
            'year'            => 'required|digits:4|integer|min:1990|max:' . date('Y'),
            'fuel_type'       => 'required|string|in:Petrol,Diesel,Hybrid,Electric,CNG',
            'color'           => 'required|string|max:50',
            'doors'           => 'required|integer|min:2|max:6',
            'cylenders'       => 'required|integer|min:1|max:12',
            'engine'          => 'required|integer|min:600|max:8000',
            'vin_number' => 'required|string|max:50',

            // SEO
            'meta_title'       => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords'    => 'required|string|max:255',

            // Images
            'images'           => 'nullable|array|max:10',
            'images.*'         => 'image|mimes:jpeg,png,jpg,webp|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Car name is required.',
            'brand_id.required' => 'Please select a car brand.',
            'brand_id.exists' => 'The selected brand is invalid.',

            'rating.required' => 'Rating is required.',
            'rating.min' => 'Rating must be at least 1.',
            'rating.max' => 'Rating cannot be more than 5.',

            'description.required' => 'Description is required.',
            'description.min' => 'Description must be at least 20 characters long.',

            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a number.',

            'body_type.required' => 'Please select a body type.',
            'body_type.exists' => 'The selected body type is invalid.',

            'condition.required' => 'Condition is required.',
            'condition.in' => 'Condition must be either brand new, pre-owned or used.',

            'milage.required' => 'Mileage is required.',
            'transmission.required' => 'Transmission type is required.',
            'transmission.in' => 'Transmission must be Automatic, Manual, or Hybrid.',

            'year.required' => 'Production year is required.',
            'year.digits' => 'Year must be a 4-digit number.',
            'year.min' => 'Year cannot be older than 1990.',
            'year.max' => 'Year cannot be in the future.',

            'fuel_type.required' => 'Fuel type is required.',
            'fuel_type.in' => 'Fuel type must be Petrol, Diesel, Hybrid, Electric, or CNG.',

            'color.required' => 'Color is required.',

            'doors.required' => 'Number of doors is required.',
            'doors.min' => 'Doors cannot be less than 2.',
            'doors.max' => 'Doors cannot be more than 6.',

            'cylenders.required' => 'Number of cylinders is required.',
            'cylenders.min' => 'Cylinders must be at least 1.',
            'cylenders.max' => 'Cylinders cannot be more than 12.',

            'engine.required' => 'Engine capacity is required.',
            'engine.min' => 'Engine must be at least 600cc.',
            'engine.max' => 'Engine cannot exceed 8000cc.',

            'vin_number.required' => 'VIN number is required.',
            'vin_number.unique' => 'This VIN number already exists.',
            'vin_number.max' => 'VIN number cannot exceed 50 characters.',

            // SEO
            'meta_title.required' => 'Meta title is required.',
            'meta_description.required' => 'Meta description is required.',
            'meta_keywords.required' => 'Meta keywords are required.',

            // Images
            'images.array' => 'Images must be an array.',
            'images.max' => 'You can upload a maximum of 10 images.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Images must be jpeg, png, jpg, or webp.',
            'images.*.max' => 'Each image must be less than 4MB.',
        ];
    }
}
