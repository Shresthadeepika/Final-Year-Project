<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Listed_Out_Vehicles;
use App\Vehicle_Info;
use App\Rented_Vehicle;
use App\User;
use App\Vehicle_Type;
use File;
use App\Mail\RentRequestMail;
use Illuminate\Support\Facades\Mail;
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

    public function show()
    {
        $user_id = Auth::user()->id;
        $vehicles = DB::table('vehicle_info')
                    ->join ('rented_vehicle','vehicle_info.vehicle_id','=','rented_vehicle.vehicle_id')
                    ->join ('vehicle_type','vehicle_info.type','=','vehicle_type.type_id')
                    ->select ('vehicle_info.*','rented_vehicle.*','vehicle_type.type')
                    ->where ([
                        ['rented_vehicle.user_id','=',$user_id ],
                        ['rented_vehicle.rent_status','=','rented']
                    ])
                    ->get ();
        // dd($vehicles);
        return view('pages.user.showRented',compact('vehicles'));
    }

    public function vehicleRent(Request $request,$id)
    {
        $today = Carbon::today();
        $input_date = Carbon::parse($request->get('rented_date'));

        //checking the input dates
        if ($input_date->isBefore($today)){
            return redirect()->back()->with('error','Entered date must from today or after today');
        }

        $vehicle = Vehicle_Info::where('vehicle_id',$id)->first();
        $listed = Listed_Out_Vehicles::where('vehicle_id',$id)->first();
        $user = Auth::user();
        $rent = $request->validate([
            'rented_date' => 'required',
            'duration' => 'required',
            'total_price' => 'required'
        ]);
        $rented = new Rented_Vehicle([
            'user_id' =>  $user->id,
            'vehicle_id' => $id,
            'rented_date' => $rent['rented_date'],
            'duration' => $rent['duration'],
            'total_price' => $rent['total_price']

        ]);
        if (!$listed) {
            $rented['rent_status'] = "rented";
            $rented->save();
            $vehicle->availability_status = "rented";
            $vehicle->update();
            return redirect('user/show/rent/vehicle')->with('success', 'Vehicle rented successfully ! ');
        }
        $owner_id = $listed->user_id; 
        $vehicle_owner = User::where('id',$owner_id)->first();

        Mail::to($vehicle_owner->email)->send(new RentRequestMail($user,$vehicle_owner,$vehicle));
        $rented->save();
        return redirect('user/show/rent/vehicle')->with('success', 'Email to vehicle owner has been sent.Please check your mail for the reply in a while. ');

        
    }
    public function destroy($id)
    {
        $rented = Rented_Vehicle::where('vehicle_id',$id)->first();
        $rented->delete();

        return redirect()->back()->with('success', 'Vehicle Info  deleted ! ');
    }
    
}
