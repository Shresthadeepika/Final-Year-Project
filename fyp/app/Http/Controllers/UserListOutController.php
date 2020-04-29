<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Listed_Out_Vehicles;
use App\Vehicle_Info;
use App\User;
use App\Vehicle_Type;
use File;
use App\Http\Requests\VehicleInfoRequest;
use Webpatser\Uuid\Uuid;
use Auth;

class UserListOutController extends Controller
{
    public function viewListed()
    {
        $user_id = Auth::user()->id;
        $vehicles = DB::table('vehicle_info')
                    ->join ('listed_out_vehicles','vehicle_info.vehicle_id','=','listed_out_vehicles.vehicle_id')
                    ->join ('vehicle_type','vehicle_info.type','=','vehicle_type.type_id')
                    ->select ('vehicle_info.*','listed_out_vehicles.*','vehicle_type.type')
                    ->where ('listed_out_vehicles.user_id','=',$user_id)
                    ->get ();
        // dd($vehicles);
        return view('pages.user.showListedVehicle',compact('vehicles'));
    }

    public function addNew()
    {
        $types = Vehicle_Type::all();
        return view('pages.user.newListedVehicle',compact('types'));
    }

    public function storeListed(VehicleInfoRequest $request)
    {
        $vehicle = new Vehicle_Info([
            'type' => $request->get('type'),
            'license' => $request->get('license'), 
            'number_plate' => $request->get('number_plate'),
            'price_per_day' => $request->get('price'),
            'company' => $request->get('company'),
            'model' => $request->get('model'),
            'year' => $request->get('year'),
        ]);
        $vehicle->vehicle_id = (Uuid::generate()->string);
        
        if ($request->hasFile('vehicle_photo'))
        {
            $file=request()->file('vehicle_photo');
            $fileName=$file->getClientOriginalName();
            $extension=$file->getClientOriginalExtension();
            $name = str_replace(' ' , '', $vehicle['number_plate']).'.'. $extension;
            if($file->move(public_path('uploads/vehicle'),$name)){
                $request['vehicle_photo'] = $name;
            }
        }
        $vehicle->vehicle_photo = $request->get('vehicle_photo');
        $vehicle->save();

        $user_id = Auth::user()->id;

        $listed = $request->validate([
            'delivery' => 'required',
            'available_from_date' => 'required',
            'available_to_date' => 'required'
        ]);
        
        $listed_out = new Listed_Out_Vehicles([
            'user_id' => $user_id,
            'vehicle_id' => $vehicle['vehicle_id'],
            'delivery' => $listed['delivery'],
            'available_from_date' => $listed['available_from_date'],
            'available_to_date' => $listed['available_to_date']
        ]);
        // dd($listed_out);
        $listed_out->save();

        return redirect('user/listed/vehicle')->with('success', 'Vehicle listed ! ');
        
    }
}
