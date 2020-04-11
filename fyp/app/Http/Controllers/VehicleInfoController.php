<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle_Info;
use App\Vehicle_Type;
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
            $name = str_replace(' ' , '', $data['number_plate']).'.'. $extension;
            if($file->move(storage_path('uploads/vehicle'),$name)){
                $request['vehicle_photo'] = $name;
            }
        }
        $vehicle->vehicle_photo = $request->get('vehicle_photo');
        $vehicle->save();

        return redirect()->back()->with('success', 'Vehicle info created successfully');
    }

    public function show()
    {
        $info = Vehicle_Info::all();
        return view('pages.admin.showVehicle',compact('info'));
    }

    public function vehicleDestroy($id)
    {
        $vehicle = Vehicle_Info::where('vehicle_id',$id);
        $vehicle->delete();
    }

    public function edit($id)
    {
        $info = Vehicle_Info::where('vehicle_id',$id)->first();
        $types = Vehicle_Type::all();
        return view('pages.admin.editVehicle',compact('info','types'));
    }

    public function update(VehicleRequest $request,$id)
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
            $name = str_replace(' ' , '', $data['number_plate']).'.'. $extension;
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

        return redirect('/admin/show/vehicle')->with('success', 'Vehicle Info  updated ! ');
    }
}
