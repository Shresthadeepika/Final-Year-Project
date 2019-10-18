<?php

namespace App\Http\Controllers;

use App\Model\Member;
use Faker\Provider\File;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    protected $data=[];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userData=Member::orderBy('member_id','desc')->get();
        //$this->data['title']=['Users'];
        return view('frontend.index',$this->data,compact('userData'));
    }
    public function create()
    {
        //
        return view('frontend.create');
    }


    public function store(Request $request)
    {
        //
        //dd($request)
    }


    public function show($id)
    {
        //
    }


    public function edit()
    {
        //
        return view('frontend.edit');
    }


    public function addUser(Request $request)
    {
        if ($request->isMethod('get')){
            return redirect()->back();
        }
        if ($request->isMethod('post')){
            $this->validate($request,[
                    'name' => 'required|min:3|max:50',
                    'email' => 'email',
                    'phone_no' => 'required|min:10|numeric',
                    'password' => 'required|confirmed|min:6',
            ],[
                'name.required'=>'Please enter your name'

            ]);
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['phone_no']=$request->phone_no;
            $data['password']=bcrypt($request->password);

            if (Member::create($data)){
                return redirect()->route('index')->with('success','Successfully added');
            }

        }

    }


        public
        function destroy($id)
        {
            //
        }

}

