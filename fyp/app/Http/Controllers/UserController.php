<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        //user details
        $users = User::all();
        return view('pages.admin.users', compact('users'));
    }

    public function destroy($id)
    {
        // delete
        $user = User::find($id);
        $user->delete();

        // redirect
        return redirect()->back()->with('success', 'Successfully deleted the user!');
    }
}
