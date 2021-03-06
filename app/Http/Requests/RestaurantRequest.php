<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    
                    'restaurant_name' => 'required|string|max:255|unique:Restaurants',
                    'restaurant_address' => 'required|string',
                    'restaurant_type' => 'required|string',
                    
                    
                ];
            case 'PATCH':
                return [
                    
                    'restaurant_name' => 'required|string|max:255|',
                    'restaurant_address' => 'required|string',
                    'restaurant_type' => 'required|string',
                    
                    
                ];
            case 'DEFAULT':
                return [];
    }
}
}
