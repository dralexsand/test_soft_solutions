<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [
                    'id' => 'required|exists:cars,id'
                ];
            }
            case 'POST':
            {
                return [
                    'photo' => 'mimes:jpeg,bmp,png',
                    'brand_id' => 'required|integer',
                    'model_id' => 'required|integer',
                    'car_created_year' => 'required|date|date_format:Y|min:value=1990|max:value=' . date('Y'),
                    'car_number' => 'required|string|min:5|max|10',
                    'color_id' => 'required|integer',
                    'transmission_id' => 'required|integer|min:value=1|min:value=2',
                    'price_per_day' => 'required|numeric',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'id' => 'required|exists:cars,id',
                    'photo' => 'mimes:jpeg,bmp,png',
                    'brand_id' => 'required|integer',
                    'model_id' => 'required|integer',
                    'car_created_year' => 'required|date|date_format:Y|min:value=1990|max:value=' . date('Y'),
                    'car_number' => 'required|string|min:5|max|10',
                    'color_id' => 'required|integer',
                    'transmission_id' => 'required|integer|min:value=1|min:value=2',
                    'price_per_day' => 'required|numeric',
                ];
            }
            default:
                return [];
                break;
        }
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'Id is required',
            'photo.mimes:jpeg,bmp,png' => 'The image must be of type: jpeg,bmp,png',
            'brand_id.required' => 'Brand is required!',
            'model_id.required' => 'Model is required!',
            'car_created_year.required|min:value=1990|max:value=' . date('Y') => 'Date is out of range (1990, ' . date('Y') . ')',
            'car_number.required' => 'Car number is required!',
            'color_id.required' => 'Color is required!',
            'transmission_id.required' => 'Transmission_id is required!',
            'price_per_day.required' => 'Price per day value is required!',
        ];
    }
}


