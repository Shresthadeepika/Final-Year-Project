<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','min:5'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact_num' => ['required','string','max:14','min:10'],
            'gender' => ['required','string'],
            'address' => ['required','string','max:255'],
            'license' => ['required','file','mimes:pdf,jpg,jpeg,png','max:5000']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (request()->hasFile('license'))
        {
            $file=request()->file('license');
            $fileName=$file->getClientOriginalName();
            $extension=$file->getClientOriginalExtension();
            $name = str_replace(' ' , '', $data['name']).strval($data['contact_num']).'.'. $extension;
            if($file->move(storage_path('uploads/license'),$name)){
                $data['license'] = $name;
            }
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'contact_num' => $data ['contact_num'],
            'license' => $data['license'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }
}
