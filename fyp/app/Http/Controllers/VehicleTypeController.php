<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle_Type;

class VehicleTypeController extends Controller
{
    public function newType()
    {
        return view('pages.admin.addNewVehicleType');
    }

    public function storeType(Request $request)
    {
       
        $type = $request->validate([
            'vehicle_type' => 'required|min:3|max:255',
            'num_of_seats' => 'required|min:1|max:2',
        ]);
        // dd($type);
        $vehicle_type = Vehicle_Type::create([
            'type' => $type['vehicle_type'],
            'num_of_seats' => $type['num_of_seats'],
        ]);

        return redirect()->back()->with('success', 'New vehicle type added successfully');
    }

    public function showType()
    {
        $types = Vehicle_Type::all();
        return view('pages.admin.showVehicleType',compact('types'));
    }

    public function typeDestroy($type_id)
    {
        // delete
        $type = Vehicle_Type::where('type_id',$type_id);
        // dd($type);
        $type->delete();

        // redirect
        return redirect()->back()->with('success', 'Successfully deleted the vehicle type!');
    }

    public function editType($id)
    {
        $type = Vehicle_Type::where('type_id',$id)->first();
        // dd($type);
        return view('pages.admin.editType', compact('type'));        
    }

    public function updateType(Request $request,$id)
    {
        $request->validate([
            'vehicle_type' => 'required|min:3|max:255',
            'num_of_seats' => 'required|min:1|max:2',
        ]);

        $type = Vehicle_Type::where('type_id',$id)->first();
        $type->type_id = $id;
        $type->type =  $request->get('vehicle_type');
        $type->num_of_seats = $request->get('num_of_seats');
        $type->save();

        return redirect('admin/show/vehicleType')->with('success', 'Type updated ! ');
    }
}
