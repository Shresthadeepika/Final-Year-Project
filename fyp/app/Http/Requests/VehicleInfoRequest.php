<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

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
        $id = Auth::user()->id;
        return [
            'type' => 'required',
            'license'=> 'required|max:15|min:13|unique:vehicle_info,license',
            'number_plate'=>'required|string|min:7|max:9|unique:vehicle_info,number_plate',
            'vehicle_photo'=> 'required|image|mimes:png,jpg,jpeg,gif,svg|max:50000000',
            'price'=> 'required|numeric|min:200|max:5000',
            'company'=> 'required|string',
            'model'=> 'required|min:5',
            'year'=> 'required|max:4|min:4',
        ];
    }
}
