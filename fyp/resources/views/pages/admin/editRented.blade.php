@extends('layouts.master')
@section('new_Vehicle_Info')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
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
                <div class="container" style="align-content=center;">
                    <h3>{{ __('Edit Rented vehicle') }}</h3>
                </div> 
                    <form method="POST" action="{{ route('admin.rent.update',$info->rented_id) }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset disabled>
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{$info->user_id}}" required autocomplete="user_id" autofocus>

                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </fieldset>

                        <fieldset disabled>
                            <div class="form-group row">
                                <label for="vehicle_id" class="col-md-4 col-form-label text-md-right">{{ __('Vehicle') }}</label>
    
                                <div class="col-md-6">
                                    <input id="vehicle_id" type="text" class="form-control @error('vehicle_id') is-invalid @enderror" name="vehicle_id" value="{{$info->vehicle_id}}" required autocomplete="vehicle_id" autofocus>
    
                                    @error('vehicle_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-group row">
                            <label for="rented_date" class="col-md-4 col-form-label text-md-right">{{ __('Rented') }}</label>

                            <div class="col-md-6">
                                <input id="rented_date" type="rented_date" class="form-control @error('rented_date') is-invalid @enderror" name="rented_date" value="{{$info->rented_date }}" required autocomplete="rented_date">

                                @error('rented_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration') }}</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{$info->duration }}" required autocomplete="duration">

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('Number Plate') }}</label>

                            <div class="col-md-6">
                                <input id="total_price" type="text" class="form-control @error('total_price') is-invalid @enderror" name="total_price" value="{{$info->total_price }}" required autocomplete="total_price">

                                @error('total_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('admin.show.rent')}}" class="btn btn-danger">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                {{-- </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection