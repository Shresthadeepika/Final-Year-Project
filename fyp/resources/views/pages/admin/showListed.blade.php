@extends('layouts.master')
@section('Vehicle_Info')
<div class="row"  style="width:100%; padding:10px;">
    <div class="row" style="width:100%;">
        <div style="width:90%; padding-left: 40px; align-content: right;">
            <h3>Vehicles For Rent</h3>
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
                        <td>Listed Out by</td>
                        <td>Vehicle</td>
                        <td>Delivery</td>
                        <td>Available From</td>
                        <td>Available To</td>
                        <td>Photo </td>
                        <td>Status</td>
                        <td colspan = 2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($listed as $info)
                    <tr>
                        <td >
                            {{$loop->iteration}}    
                        </td>
                        <td style="display:none;">
                            {{$info->listed_id}}
                        </td>
                        <td>{{$info->name}} </td>
                        <td>{{$info->number_plate}}</td>
                        <td>{{$info->delivery}}</td>
                        <td>{{$info->available_from_date}}</td>
                        <td>{{$info->available_to_date}}</td>
                        <td>
                            <a href="/uploads/vehicle/{{$info->vehicle_photo}}">
                                {{$info->vehicle_photo}}
                            </a>
                        </td>
                            <td>{{$info->availability_status}}</td>
                        <td> 
                            <div class="row">
                                <div class="col-auto">
                                  <a class="btn" href="{{--route('admin.list.edit',$info->vehicle_id)--}}" style="background:transparent;">
                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:blue;"></span>
                                  </a>
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