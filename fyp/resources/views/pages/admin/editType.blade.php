@extends('layouts.master')
@section('newVehicleType')
<div class="container">
    <h4>Edit vehicle type</h4>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                    <form method="POST" action="{{ route('admin.type.update',$type->type_id)}}" enctype="multipart/form-data"> 
                        @csrf

                        <div class="form-group row">
                            <label for="vehicle_type" class="col-md-4 col-form-label text-md-right">{{ __('Type of Vehicle') }}</label>

                            <div class="col-md-6">
                                <input id="vehicle_type" type="text" class="form-control @error('vehicle_type') is-invalid @enderror" name="vehicle_type"  value="{{ $type->type }}" required autocomplete="vehicle_type" autofocus>

                                @error('vehicle_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_of_wheels" class="col-md-4 col-form-label text-md-right">{{ __('Number of Wheels') }}</label>

                            <div class="col-md-6">
                                <input id="num_of_wheels" type="text" class="form-control @error('num_of_wheels') is-invalid @enderror" name="num_of_wheels" value="{{ $type->num_of_wheels }}" required autocomplete="num_of_wheels">

                                @error('num_of_wheels')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('admin.showType')}}" class="btn btn-danger">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection