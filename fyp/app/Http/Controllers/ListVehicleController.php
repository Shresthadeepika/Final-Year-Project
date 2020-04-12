<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listed_Out_Vehicles;

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
}
