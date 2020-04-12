@extends('layouts.master')
@section('newVehicleType')
<div class="container">
    <h4>Add new Category</h4>
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
                    <form method="POST" action="{{ route('admin.storeType') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="vehicle_type" class="col-md-4 col-form-label text-md-right">{{ __('Type of Vehicle') }}</label>

                            <div class="col-md-6">
                                <input id="vehicle_type" type="text" class="form-control @error('vehicle_type') is-invalid @enderror" name="vehicle_type"  value="{{ old('vehicle_type') }}" required autocomplete="vehicle_type" autofocus>

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
                                <input id="num_of_wheels" type="text" class="form-control @error('num_of_wheels') is-invalid @enderror" name="num_of_wheels" value="{{ old('num_of_wheels') }}" required autocomplete="num_of_wheels">

                                @error('num_of_wheels')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection