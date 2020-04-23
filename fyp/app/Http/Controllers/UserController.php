<?php

namespace App\Http\Controllers;
use App\User;
use File;
use Auth;
use App\Vehicle_Info;
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
}
