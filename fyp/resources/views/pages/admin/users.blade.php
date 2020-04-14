@extends('layouts.master')
@section('user')
<div class="row"  style="width:100%; padding:10px;">
    <div class="row" style="width:100%;">
        <div style="padding-left: 40px;">
            <h3>Users</h3>
        </div>
    </div>
        <div class="col-sm-12 " style="align-content:center;">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>  
            @elseif ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif         
            <table class="table table-striped table-hover" >
                <thead style="font-variant: small-caps; font-weight:bold;">
                    <tr>
                        <td>
                            ID
                        </td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>Gender</td>
                        <td>Contact Number </td>
                        <td>License</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td >
                            {{$loop->iteration}}    
                        </td>
                        <td style="display:none;">
                            {{$user->id}}
                        </td>
                        <td>{{$user->name}} </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->contact_num}}</td>
                        <td>
                            <a href="storage/uploads/license/{{$user->license}}">
                                {{$user->license}}
                            </a>
                        </td>
                        <td>
                            {{-- <button type="button" class="btn btn-primary" href="">Edit</button> --}}
                            
                            <form action="{{ route('admin.user.destroy',$user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    @if ($user->is_admin != 1)
                                    <button type="submit" class="btn" style="background:transparent;">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="false" style="color:red;"></span>
                                    </button> 
                                    @endif 
                            </form> 
                              
                        </td>  
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection