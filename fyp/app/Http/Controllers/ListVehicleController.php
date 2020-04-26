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

class ListVehicleController extends Controller
{
    public function show()
    {
        $listed = Listed_Out_Vehicles::all();
        return view('pages.admin.showListed',compact('listed'));
    }

    public function listedVehicleDestroy($id)
    {
        $vehicle = Listed_Out_Vehicles::where('listed_id',$id);
        $vehicle->delete();

        return redirect()->back()->with('success', 'Vehicle  deleted ! ');
    }

    public function update(Request $request,$id)
    {
        $info = Listed_Out_Vehicles::where('listed_id',$id)->first();

        $info->listed_id =$id;
        $info->user_id = $request->get('user_id');
        $info->vehicle_id = $request->get('vehicle_id');
        $info->delivery = $request->get('delivery');
        $info->available_from_date = $request->get('available_from_date');
        $info->available_to_date = $request->get('available_to_date');
        $info->update();

        return redirect('/show/Rentedvehicle')->with('success', 'Listed vehicle info  updated ! ');
        
    }

    public function viewListed()
    {
        $user_id = Auth::user()->id;
        $vehicles = DB::table('vehicle_info')
                    ->join ('listed_out_vehicles','vehicle_info.vehicle_id','=','listed_out_vehicles.vehicle_id')
                    ->select ('vehicle_info.*','listed_out_vehicles.*')
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
        
    }
}
