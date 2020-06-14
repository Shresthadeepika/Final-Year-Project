@extends('layouts.master')
@section('Vehicle_Info')
<div class="row"  style="width:100%; padding:10px;">
    <div class="row" style="width:100%;">
        <div style="width:90%; padding-left: 40px;">
            <h3>Rented Vehicle</h3>
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
                        <td>Rented By</td>
                        <td>Vehicle</td>
                        <td>Rented Date</td>
                        <td>Duration</td>
                        <td>Total Price</td>
                        <td>Payment method </td>
                        <td>Rent status </td>
                        <td colspan = 2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($rented as $info)
                    <tr>
                        <td >
                            {{$loop->iteration}}    
                        </td>
                        <td style="display:none;">
                            {{$info->vehicle_id}}
                        </td>
                        <td>{{$info->name}} </td>
                        <td>{{$info->number_plate}}</td>
                        <td>{{$info->rented_date}}</td>
                        <td>{{$info->duration}} days</td>
                        <td>{{$info->total_price}}</td>
                        <td>{{$info->payment_method}}</td>
                        <td>{{$info->rent_status}}</td>
                        <td> 
                            <div class="row">
                                <div class="col-auto">
                                  <a class="btn" href="{{route('admin.rent.edit',$info->rented_id)}}" style="background:transparent;">
                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:blue;"></span>
                                  </a>
                                </div> 
                                <div class="col-auto">                          
                                    <form action="{{ route('admin.rent.destroy',$info->rented_id) }}" method="POST">
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