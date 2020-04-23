<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user= Auth::user();
        // dd($user);
        return view('pages.user.profile',compact('user'));
    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();
        return view('pages.user.editProfile',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;
        // dd($id);
        $request->validate([
            'name' => 'required|string|max:255|min:5',
            'contact_num' => 'required|string|max:14|min:10',
            'gender' => 'required|string',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id
        ]);
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->gender = $request->get('gender');
        $user->contact_num = $request->get('contact_num');
        $user->update();

        return redirect('/user/profile')->with('success','Your profile info is updated.');
    }
}
