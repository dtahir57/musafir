<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
                    
                    'room_no' => 'required|string|max:255',
                    'room_floor' => 'required|string',
                    'room_type' => 'required|string',
                    'room_status' => 'required|string',
                    'room_price' => 'required|string',
                ];
            case 'PATCH':
                return [
                    
                    'room_no' => 'required|string|max:255',
                    'room_floor' => 'required|string',
                    'room_type' => 'required|string',
                    'room_status' => 'required|string',
                    'room_price' => 'required|string',
                ];
            case 'DEFAULT':
                return [];
    }
}
}