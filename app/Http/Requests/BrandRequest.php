<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
                    'id' => 'required|exists:brands,id'
                ];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|string|min:1|max:255',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'id' => 'required|exists:brands,id',
                    'name' => 'required|string|min:1|max:255',
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
            'id.required' => 'Id is required!',
            'name.required' => 'Name is required!',
        ];
    }
}
