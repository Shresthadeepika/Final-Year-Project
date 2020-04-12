<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleInfoRequest extends FormRequest
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
        return [
            'type' => 'required',
            'license'=> 'required|max:15|min:13',
            'number_plate'=>'required|string|min:7|max:9',
            'vehicle_photo'=> 'required|mimes:png,jpg,jpeg|max:5000000',
            'price'=> 'required|numeric|min:200|max:5000',
            'company'=> 'required|string',
            'model'=> 'required',
            'year'=> 'required|max:4|min:4',
        ];
    }
}
