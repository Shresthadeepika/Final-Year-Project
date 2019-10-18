@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session ('success')}}
                </div>
            @endif
            <div class="col-md-8">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                    @foreach($userData as $key=>$userDatum)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$userDatum->name}}</td>
                            <td>{{$userDatum->email}}</td>
                            <td>{{$userDatum->phone_no}}</td>
                            <td>{{$userDatum->status}}</td>
                            <td>{{$userDatum->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection

