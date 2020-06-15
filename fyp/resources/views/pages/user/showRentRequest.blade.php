@extends('layouts.userMaster')
@section('vehicle_rent')
    <div class="row" >
        <div style="width:85%; padding-left: 40px;">
            <h3>Rent Requests</h3>
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
                            <td>Price per day</td>
                            <td>Rented Date</td>
                            <td>Duration </td>
                            <td>Total Price </td>
                            <td>Photo</td>
                            <td colspan = 2>Status/Action</td>
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
                            <td>{{$vehicle->rented_date}}</td>
                            <td>{{$vehicle->duration}} day</td>
                            <td>{{$vehicle->total_price}}</td>
                            <td>
                                <a href="/uploads/vehicle/{{$vehicle->vehicle_photo}}">
                                    {{$vehicle->vehicle_photo}}
                                </a>
                            </td>
                            @if ($vehicle->rent_status == "pending")
                            <td> 
                                <div class="row">
                                    <div class="col-auto">
                                    <a class="btn btn-success" href="{{route('user.rent.approve',$vehicle->vehicle_id)}}">
                                        <i class="fas fa-fw fa-check"></i>Accept
                                    </a>
                                    </div> 
                                    <div class="col-auto">
                                        <a class="btn btn-danger" href="{{route('user.rent.reject',$vehicle->vehicle_id)}}">
                                            <i class="fas fa-fw fa-exclamation-triangle"></i> Reject
                                        </a>
                                    </div> 
                                    
                                </div>                               
                            </td>  
                            @else
                                <td>{{$vehicle->rent_status}}
                            @endif
                             
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
@endsection