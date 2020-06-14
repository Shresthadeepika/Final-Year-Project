@extends('layouts.userMaster')
@section('listed_vehicles')
@if ($vehicles == null)
    <div class="row" >
        <div style="width:90%; padding-left: 40px;">
            <h3>Listed Vehicles</h3>
        </div>
        <div style="width:10%; padding:18px">
            <a href="{{route('user.add.listed')}}" class="btn btn-primary">
                List new Vehicle
            </a>
        </div>
    </div> 
@else 
    <div class="row" style="width:100%; padding:10px;">
        <div class="row" style="width: 100%;">
            <div style="width:85%; padding-left: 40px;">
                <h3>Listed Vehicles </h3>
            </div>
            <div style="width:15%; padding:18px">
                <a href="{{route('user.add.listed')}}" class="btn btn-primary">
                    List new Vehicle
                </a>
            </div>
        </div>  
             
            <div class="col-sm-12 " style="align-content:center;">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @elseif(session()->get('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                    </div><br/>
                @endif 
                <table class="table table-striped">
                    <thead style="font-variant: small-caps; font-weight:bold;">
                        <tr>
                            <td>S.No.</td>
                            <td>Type</td>
                            <td>Company</td>
                            <td>Model</td>
                            <td>Year</td>
                            <td>Number Plate</td>
                            <td>License number</td>
                            <td>Price</td>
                            <td>Delivery</td>
                            <td>Available From </td>
                            <td>Available To </td>
                            <td>Photo</td>
                            <td colspan = 2>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr>
                            <td >
                                {{$loop->iteration}}    
                            </td>
                            <td style="display:none;">
                                {{$vehicle->vehicle_id}}
                            </td>
                            <td>{{$vehicle->type}} </td>
                            <td>{{$vehicle->company}}</td>
                            <td>{{$vehicle->model}}</td>
                            <td>{{$vehicle->year}}</td>
                            <td>{{$vehicle->number_plate}}</td>
                            <td>{{$vehicle->license}}</td>
                            <td>{{$vehicle->price_per_day}}</td>
                            <td>{{$vehicle->delivery}}</td>
                            <td>{{$vehicle->available_from_date}}</td>
                            <td>{{$vehicle->available_to_date}}</td>
                            <td>
                                <a href="/uploads/vehicle/{{$vehicle->vehicle_photo}}">
                                    {{$vehicle->vehicle_photo}}
                                </a>
                            </td>
                            <td> 
                                <div class="row">
                                    <div class="col-auto">
                                    <a class="btn" href="{{route('user.edit.listed',$vehicle->vehicle_id)}}" style="background:transparent;">
                                          <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:blue;"></span>
                                      </a>
                                    </div> 
                                    <div class="col-auto">                          
                                    <form action="{{route('user.destroy.listed',$vehicle->vehicle_id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn" style="background:transparent;">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="false" style="color:red;"></span>
                                                </button> 
                                        </form> 
                                    </div>
                                </div>                               
                            </td>  
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div> 
@endif
@endsection