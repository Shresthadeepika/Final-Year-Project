<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Validation\Rule;
use App\Listed_Out_Vehicles;

class UpdateListedVehicleRequest extends FormRequest
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
        $vehicle_id = Auth::user()->listed_outVehicle()->first()->vehicle_id;
        return [
            'type' => 'required',
            'number_plate'=>[
                'required','string','min:7','max:9',
                Rule::unique('vehicle_info')->ignore($vehicle_id,'vehicle_id')],
            'license'=> [
                'required','max:15','min:13',
                Rule::unique('vehicle_info')->ignore($vehicle_id,'vehicle_id')],
            'vehicle_photo'=> 'required|image|mimes:png,jpg,jpeg,gif,svg|max:50000000',
            'price'=> 'required|numeric|min:200|max:5000',
            'company'=> 'required|string',
            'model'=> 'required|min:5',
            'year'=> 'required|max:4|min:4',
            'delivery' => 'required',
            'available_from_date' => 'required',
            'available_to_date' => 'required'
        ];
    }
}
