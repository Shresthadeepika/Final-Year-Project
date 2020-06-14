<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rented_Vehicle;
use Illuminate\Support\Facades\DB;

class RentVehicleController extends Controller
{
    public function show()
    {
        // $rented = Rented_Vehicle::all();
        $rented = DB::table('vehicle_info')
                    ->join ('rented_vehicle','vehicle_info.vehicle_id','=','rented_vehicle.vehicle_id')
                    ->join ('users','rented_vehicle.user_id','=','users.id')
                    ->select ('vehicle_info.*','rented_vehicle.*','users.name')->get();
        // dd($rented);
        return view('pages.admin.showRented',compact('rented'));
    }

    public function rentedVehicleDestroy($id)
    {
        $vehicle = Rented_Vehicle::where('rented_id',$id);
        $vehicle->delete();

        return redirect()->back()->with('success', 'Vehicle  deleted ! ');
    }

    public function edit($id)
    {
        $info = Rented_Vehicle::where('rented_id',$id)->first();
        return view('pages.admin.editRented',compact('info'));
    }

    public function update(Request $request,$id)
    {
        $info = Rented_Vehicle::where('rented_id',$id)->first();

        $info->rented_id =$id;
        $info->user_id = $request->get('user_id');
        $info->vehicle_id = $request->get('vehicle_id');
        $info->rented_date = $request->get('rented_date');
        $info->duration = $request->get('duration');
        $info->total_price = $request->get('total_price');
        $info->update();

        return redirect('/show/Listedvehicle')->with('success', 'Rented vehicle info  updated ! ');
        
    }
}
