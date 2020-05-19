<?php

namespace App\Http\Controllers;
use App\User;
use File;
use Auth;
use App\Vehicle_Info;
use App\Vehicle_Type;
use App\Listed_Out_Vehicles;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserDetails()
    {
        //user details
        $users = User::all();
        return view('pages.admin.users', compact('users'));
    }

    public function userDestroy($id)
    {
        // delete
        $user = User::find($id);
        File::delete(storage_path('/uploads/license/'.$user->license));
        $user->delete();

        // redirect
        return redirect()->back()->with('success', 'Successfully deleted the user!');
    }
    // public function newUser(Request $request)
    // {
    //     return view('pages.admin.addNewUser');
    // }

    public function userDashboard()
    {
        $vehicles = Vehicle_Info::where(
            'availability_status','=','available'
        )->get();
        return view('pages.user.dashboard',compact('vehicles'));
    }

    public function details($id)
    {
        // $listed = Listed_Out_Vehicles::where('vehicle_id',$id)->first();
        $vehicle = Vehicle_Info::where('vehicle_id',$id)->first();
        $listed = Listed_Out_Vehicles::where('vehicle_id',$id)->first();
        $types = Vehicle_Type::all();
        return view('pages.user.vehicleDetail',compact('vehicle','types','listed'));
    }

    public function vehicleList()
    {
        $vehicles = Vehicle_Info::where(
            'availability_status','=','available'
        )->get();
        return view('pages.user.vehicleList',compact('vehicles'));
    }
}
