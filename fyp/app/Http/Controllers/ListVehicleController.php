<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return redirect('admin/show/Rentedvehicle')->with('success', 'Listed vehicle info  updated ! ');
        
    }
}
