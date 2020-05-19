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

class UserListOutController extends Controller
{
    public function viewListed()
    {
        $user_id = Auth::user()->id;
        $vehicles = DB::table('vehicle_info')
                    ->join ('listed_out_vehicles','vehicle_info.vehicle_id','=','listed_out_vehicles.vehicle_id')
                    ->join ('vehicle_type','vehicle_info.type','=','vehicle_type.type_id')
                    ->select ('vehicle_info.*','listed_out_vehicles.*','vehicle_type.type')
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
        $from = Carbon::parse($request->get('available_from_date'));
        $to = Carbon::parse($request->get('available_to_date'));

        // $result = checkDates($from,$to);
        $today = Carbon::today();
        $max = Carbon::parse('2030-12-30 00:00:00');
        // dd($from->isBefore($today));
        if($from->isBefore($today)){
            return redirect()->back()->with('error','Entered available date must start from today or further');
        }

        if ($to->gt($max)){
            return redirect()->back()->with('error','Entered available date must be end within year 2030');
        }

        if ($from->diffInDays($to) > 365){
            return redirect()->back()->with('error','Entered available duration must be less than a year');
        }
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
    
            $user_id = Auth::user()->id;
    
            $listed = $request->validate([
                'delivery' => 'required',
                'available_from_date' => 'required',
                'available_to_date' => 'required'
            ]);
            
            $listed_out = new Listed_Out_Vehicles([
                'user_id' => $user_id,
                'vehicle_id' => $vehicle['vehicle_id'],
                'delivery' => $listed['delivery'],
                'available_from_date' => $listed['available_from_date'],
                'available_to_date' => $listed['available_to_date']
            ]);
            // dd($listed_out);
            $listed_out->save();
    
            return redirect('user/listed/vehicle')->with('success', 'Vehicle listed ! ');
        // }
        
    }

    public function destroy($id)
    {
        $listed = Listed_Out_Vehicles::where('vehicle_id',$id)->first();
        $listed->delete();

        $vehicle = Vehicle_Info::where('vehicle_id',$id)->first();
        File::delete(public_path('/uploads/vehicle/'.$vehicle->vehicle_photo));
        $vehicle->delete();

        return redirect()->back()->with('success', 'Vehicle Info  deleted ! ');
    }

    public function edit($id)
    {
        $listed = Listed_Out_Vehicles::where('vehicle_id',$id)->first();
        $vehicle = Vehicle_Info::where('vehicle_id',$id)->first();
        $types = Vehicle_Type::all();

        return view('pages.user.editListedVehicle',compact('listed','vehicle','types'));
    }

    public function update(UpdateListedVehicleRequest $request,$id)
    {
        $from = Carbon::parse($request->get('available_from_date'));
        $to = Carbon::parse($request->get('available_to_date'));

        $today = Carbon::today();
        $max = Carbon::parse('2030-12-30 00:00:00');

        if($from->isBefore($today)){
            return redirect()->back()->with('error','Entered available date must start from today or further');
        }

        if ($to->gt($max)){
            return redirect()->back()->with('error','Entered available date must be end within year 2030');
        }

        if ($from->diffInDays($to) > 365){
            return redirect()->back()->with('error','Entered available duration must be less than a year');
        }

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

        $user_id = Auth::user()->id;

        $listed = Listed_Out_Vehicles::where('vehicle_id',$id)->first();
            
            $listed->user_id = $user_id;
            $listed->vehicle_id = $id;
            $listed->delivery = $request->get('delivery');
            $listed->available_from_date = $request->get('available_from_date');
            $listed->available_to_date = $request->get('available_to_date');
            $listed->save();
    
            return redirect('user/listed/vehicle')->with('success', 'Vehicle Info  updated !');
    }
    
    // public function checkDates($from,$to)
    // {
    //     $today = Carbon::today();
    //     $max = 2030-12-30;
    //     if($from->isPast()){
    //         return redirect()->back()->with('error','Entered available date must start from today or further');
    //     }

    //     if (!$to->lt($max)){
    //         return redirect()->back()->with('error','Entered available date must be end within year 2030');
    //     }

    //     if ($from->diffInDays($to) > 365){
    //         return redirect()->back()->with('error','Entered available duration must be less than a year');
    //     }

    //     return true;
    // }


}
