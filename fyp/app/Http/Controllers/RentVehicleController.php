<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rented_Vehicle;

class RentVehicleController extends Controller
{
    public function show()
    {
        $rented = Rented_Vehicle::all();
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
