@extends('layouts.master')
@section('Vehicle_Info')
<div class="row"  style="width:100%; padding:10px;">
    <div class="row" style="width:100%;">
        <div style="width:90%; padding-left: 40px;">
            <h3>Vehicle Types</h3>
        </div>
        <div style="width:10%; padding:18px">
            <a href="{{route('admin.new.vehicle')}}" class="btn btn-primary">
                Add New
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
                </div><br />
            @endif            
            <table class="table table-striped table-hover">
                <thead style="font-variant: small-caps; font-weight:bold;">
                    <tr>
                        <td>
                            S.No.
                        </td>
                        <td>Type</td>
                        <td>Company</td>
                        <td>Model</td>
                        <td>Year</td>
                        <td>Number Plate</td>
                        <td>License number</td>
                        <td>Price</td>
                        <td>Photo</td>
                        <td colspan = 2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($vehicles as $info)
                    <tr>
                        <td >
                            {{$loop->iteration}}    
                        </td>
                        <td style="display:none;">
                            {{$info->vehicle_id}}
                        </td>
                        <td>{{$info->type}} </td>
                        <td>{{$info->company}}</td>
                        <td>{{$info->model}}</td>
                        <td>{{$info->year}}</td>
                        <td>{{$info->number_plate}}</td>
                        <td>{{$info->license}}</td>
                        <td>{{$info->price_per_day}}</td>
                        <td>
                            <a href="/uploads/vehicle/{{$info->vehicle_photo}}">
                                {{$info->vehicle_photo}}
                            </a>
                        </td>
                        <td> 
                            <div class="row">
                                <div class="col-auto">
                                  <a class="btn" href="{{route('admin.vehicle.edit',$info->vehicle_id)}}" style="background:transparent;">
                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:blue;"></span>
                                  </a>
                                </div> 
                                <div class="col-auto">                          
                                    <form action="{{ route('admin.vehicle.destroy',$info->vehicle_id) }}" method="POST">
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
</div>
@endsection