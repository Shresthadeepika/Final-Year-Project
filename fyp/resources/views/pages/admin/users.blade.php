@extends('layouts.master')
@section('user')
    <div class="row"  style="padding:10px;">
    <div class="row" style="width:100%;">
        <div style="width:88%; padding-left: 20px;">
            <h3>Users</h3>
        </div>
        <div style="width:12%;">
            <button type="button" class="btn btn-primary" href="{{route('admin.addNewUser')}}">
                Add new user
            </button>
        </div>
    </div>
        <div class="col-sm-12 " style="padding:10px;">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif            
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
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
                        </td>
                        <td>
                            {{-- <button type="button" class="btn btn-primary" href="">Edit</button> --}}
                            
                            <form action="{{ route('admin.user.destroy',$user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-default" href="">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                </button>
                                @if ($user->is_admin != 1)
                                    <button type="submit" class="btn btn-danger">Delete</button>
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