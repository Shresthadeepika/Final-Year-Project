@extends('layouts.master')
@section('vehicleType')
<div class="row"  style="width:100%; padding:10px;">
    <div class="row" style="width:100%; height:100%">
        <div class="col-auto" style="width:90%; padding-left: 40px;">
            <h3>Vehicle Category</h3>
        </div>
        <div style="width:10%; padding:18px">
            <a href="{{route('admin.newType')}}" class="btn btn-primary">
                Add New
            </a>
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
            <table class="table table-striped table-hover">
                <thead style="font-variant: small-caps; font-weight:bold;">
                    <tr>
                        <td>
                            S.No.
                        </td>
                        <td>Vehicle Category</td>
                        <td>Number of seats</td>
                        <td colspan = 2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($types as $type)
                    <tr>
                        <td >
                            {{$loop->iteration}}    
                        </td>
                        <td style="display:none;">
                            {{$type->type_id}}
                        </td>
                        <td>{{$type->type}} </td>
                        <td>{{$type->num_of_seats}}</td>
                        <td> 
                            <div class="row">
                                <div class="col-auto">
                                  <a class="btn" href="{{route('admin.type.edit',$type->type_id)}}" style="background:transparent;">
                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:blue;"></span>
                                  </a>
                                </div> 
                                <div class="col-auto">                          
                                    <form action="{{ route('admin.type.destroy',$type->type_id) }}" method="POST">
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