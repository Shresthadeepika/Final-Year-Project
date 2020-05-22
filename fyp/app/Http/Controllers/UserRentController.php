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
use App\Http\Requests\UpdateListedVehicleRequest;
use Webpatser\Uuid\Uuid;
use Auth;
use Carbon\Carbon;

class UserRentController extends Controller
{
    public function rentForm($id)
    {
        $vehicle = Vehicle_Info::where('vehicle_id',$id)->first();
        $types = Vehicle_Type::all();
        $listed = Listed_Out_Vehicles::where('vehicle_id',$id)->first();
        // dd($vehicle);
        return view('pages.user.rentForm',compact('vehicle','types','listed'));
    }

    public function vehicleRent(VehicleInfoRequest $request,$id)
    {
        
    }
    
}
