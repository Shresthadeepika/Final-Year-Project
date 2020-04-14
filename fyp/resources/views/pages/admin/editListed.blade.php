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
                    <form method="POST" action="{{ route('admin.list.update',$info->listed_id) }}" enctype="multipart/form-data">
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
                            <label for="delivery" class="col-md-4 col-form-label text-md-right">{{ __('Delivery') }}</label>

                            <div class="col-md-6">
                                <input id="delivery" type="delivery" class="form-control @error('delivery') is-invalid @enderror" name="delivery" value="{{$info->delivery }}" required autocomplete="delivery">

                                @error('delivery')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="available_from_date" class="col-md-4 col-form-label text-md-right">{{ __('Available  From') }}</label>

                            <div class="col-md-6">
                                <input id="available_from_date" type="text" class="form-control @error('available_from_date') is-invalid @enderror" name="available_from_date" value="{{$info->available_from_date }}" required autocomplete="available_from_date">

                                @error('available_from_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="available_to_date" class="col-md-4 col-form-label text-md-right">{{ __('Available To') }}</label>

                            <div class="col-md-6">
                                <input id="available_to_date" type="text" class="form-control @error('available_to_date') is-invalid @enderror" name="available_to_date" value="{{$info->available_to_date }}" required autocomplete="available_to_date">

                                @error('available_to_date')
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
                                <a href="{{route('admin.show.list')}}" class="btn btn-danger">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection