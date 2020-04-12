@extends('layouts.master')
@section('Vehicle_Info')
<div class="row"  style="padding:10px;">
    <div class="row" style="width:100%;">
        <div style="width:90%; padding-left: 30px; align-content: right;">
            <h3>Vehicle For Rent</h3>
        </div>
    </div>
        <div class="col-sm-12 " style="padding:10px;">

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
            <table class="table table-striped table-hover">
                <thead style="font-variant: small-caps; font-weight:bold;">
                    <tr>
                        <td>
                            S.No.
                        </td>
                        <td>User</td>
                        <td>Vehicle</td>
                        <td>Delivery</td>
                        <td>Available From</td>
                        <td>Available To</td>
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
                        <td>{{$info->user_id}} </td>
                        <td>{{$info->vehicle_id}}</td>
                        <td>{{$info->delivery}}</td>
                        <td>{{$info->available_from_date}}</td>
                        <td>{{$info->available_to_date}}</td>
                        <td> 
                            <div class="row">
                                <div class="col-auto">
                                  <a class="btn" href="{{--route('admin.list.edit',$info->vehicle_id)--}}" style="background:transparent;">
                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:blue;"></span>
                                  </a>
                                </div> 
                                <div class="col-auto">                          
                                    <form action="{{ route('admin.list.destroy',$info->listed_id) }}" method="POST">
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