@extends('layouts.userMaster')
@section('vehicle_rent')
    <div class="row" >
        <div style="width:85%; padding-left: 40px;">
            <h3>Rented Vehicles</h3>
        </div>
        <div style="width:15%; padding:18px">
            <a href="{{route('user.list.vehicles')}}" class="btn btn-primary">
                Rent new Vehicle
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
                            <td>Price per day</td>
                            <td>Rented Date</td>
                            <td>Duration </td>
                            <td>Total Price </td>
                            <td>Status</td>
                            <td>Photo</td>
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
                            <td>{{$vehicle->rent_status}}</td>
                            <td>
                                <a href="/uploads/vehicle/{{$vehicle->vehicle_photo}}">
                                    {{$vehicle->vehicle_photo}}
                                </a>
                            </td>
                            {{-- <td> 
                                <div class="row">
                                    <div class="col-auto">
                                    <a class="btn" href="{{route('user.edit.rented',$vehicle->vehicle_id)}}" style="background:transparent;">
                                          <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:blue;"></span>
                                      </a>
                                    </div> 
                                    <div class="col-auto">                          
                                    <form action="{{ route('user.destroy.rented',$vehicle->vehicle_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn" style="background:transparent;">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="false" style="color:red;"></span>
                                                </button> 
                                        </form> 
                                    </div> 
                                </div>                               
                            </td>   --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
@endsection