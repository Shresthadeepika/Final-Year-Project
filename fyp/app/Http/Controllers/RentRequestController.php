<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Listed_Out_Vehicles;
use App\Vehicle_Info;
use App\Rented_Vehicle;
use App\User;
use App\Vehicle_Type;
use File;

class RentRequestController extends Controller
{
    public function show()
    {
        $user_id = Auth::user()->id;
        $vehicles = DB::table('vehicle_info')
                    ->join ('listed_out_vehicles','vehicle_info.vehicle_id','=','listed_out_vehicles.vehicle_id')
                    ->join ('rented_vehicle','listed_out_vehicles.vehicle_id','=','rented_vehicle.vehicle_id')
                    ->join ('vehicle_type','vehicle_info.type','=','vehicle_type.type_id')
                    ->select ('vehicle_info.*','rented_vehicle.*','vehicle_type.type','rented_vehicle.*')
                    ->where ('listed_out_vehicles.user_id','=',$user_id)
                    ->get ();
        // dd($vehicles);
        return view('pages.user.showRentRequest',compact('vehicles'));
    }
}
