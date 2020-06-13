<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle_Info;
use App\Vehicle_Type;
use App\Rented_Vehicle;
use File;
use App\Http\Requests\VehicleInfoRequest;
use Webpatser\Uuid\Uuid;

class VehicleInfoController extends Controller
{
    public function new()
    {
        $types = Vehicle_Type::all();
        return view('pages.admin.addNewVehicle',compact('types'));
    }

    public function store(VehicleInfoRequest $request)
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

        return redirect()->back()->with('success', 'Vehicle info created successfully');
    }

    public function show()
    {
        $vehicles = Vehicle_Info::all();
        return view('pages.admin.showVehicle',compact('vehicles'));
    }

    public function vehicleDestroy($id)
    {
        $rented = Rented_Vehicle::where('vehicle_id',$id)->first();
        if (!rented)
        {
            $vehicle = Vehicle_Info::where('vehicle_id',$id)->first();
            File::delete(public_path('/uploads/vehicle/'.$vehicle->vehicle_photo));
            $vehicle->delete();

            return redirect()->back()->with('success', 'Vehicle Info  deleted ! ');
        }
        return redirect()->back()->with('error', 'Vehicle is currently being rented. so delete action is prohibited ! ');
    }

    public function edit($id)
    {
        $info = Vehicle_Info::where('vehicle_id',$id)->first();
        $types = Vehicle_Type::all();
        return view('pages.admin.editVehicle',compact('info','types'));
    }

    public function update(VehicleInfoRequest $request,$id)
    {
        $info = Vehicle_Info::where('vehicle_id',$id)->first();

        $info->vehicle_id =$id;
        $info->type = $request->get('type');
        $info->license = $request->get('license');
        $info->number_plate = $request->get('number_plate');

        if ($request->hasFile('vehicle_photo'))
        {
            $file=request()->file('vehicle_photo');
            $fileName=$file->getClientOriginalName();
            $extension=$file->getClientOriginalExtension();
            $name = str_replace(' ' , '', $info['number_plate']).'.'. $extension;
            if($file->move(storage_path('uploads/vehicle'),$name)){
                $request['vehicle_photo'] = $name;
            }
        }

        $info->vehicle_photo = $request->get('vehicle_photo');
        $info->price_per_day = $request->get('price');
        $info->company = $request->get('company');
        $info->model = $request->get('model');
        $info->year = $request->get('year');
        $info->save();

        return redirect('/admin/showVehicle')->with('success', 'Vehicle Info  updated ! ');
    }
}
