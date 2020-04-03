<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userShow()
    {
        //user details
        $users = User::all();
        return view('pages.admin.users', compact('users'));
    }

    public function userDestroy($id)
    {
        // delete
        $user = User::find($id);
        $user->delete();

        // redirect
        return redirect()->back()->with('success', 'Successfully deleted the user!');
    }
    public function newUser(Request $request)
    {
        return view('pages.admin.addNewUser');
    }

    public function showUserDetails()
    {
        // $userDetails = UserDetails::all();
        // return view('pages.admin.userDetails',compact('userDetails'));
    }
}
