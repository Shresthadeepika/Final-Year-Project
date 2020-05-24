@extends('layouts.userMaster')
@section('listed_vehicles')
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h3>Give out vehicles for rent</h3>
        </div>
    </div>
    <hr>
    <div class="row" style="font-weight: bold; width:100%;">
  		<!--<div class="col-sm-3">left col-->
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
        <!--</div>/col-3-->
            <form method="POST" action="{{route('user.store.listed')}}" enctype="multipart/form-data" >
                @csrf

                <div class="col col-lg-6">
                    <div class="tab-content">
                          <div class="tab-pane active">

                            <div class="form-group row">
                                <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

                                <div class="col-md-6">
                                    <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company" autofocus>

                                    @error('company')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

                                <div class="col-md-6">
                                    <input id="model" type="model" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required autocomplete="model">

                                    @error('model')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year of manufacture') }}</label>

                                <div class="col-md-6">
                                    <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" required autocomplete="year">

                                    @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number_plate" class="col-md-4 col-form-label text-md-right">{{ __('Number Plate') }}</label>

                                <div class="col-md-6">
                                    <input id="number_plate" type="text" class="form-control @error('number_plate') is-invalid @enderror" name="number_plate" value="{{ old('number_plate') }}" required autocomplete="number_plate">

                                    @error('number_plate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="license" class="col-md-4 col-form-label text-md-right">{{ __('License Number') }}</label>

                                <div class="col-md-6">
                                    <input id="license" type="text" class="form-control @error('license') is-invalid @enderror" name="license" value="{{ old('license') }}" required autocomplete="license">

                                    @error('license')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price per day') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                    
                        </div><!--/tab-pane-->
                    </div><!--/tab-content-->
                </div><!--/col-6-->

                <div class="col col-lg-6">
                    <div class="tab-content">
                          <div class="tab-pane active">

                            <div class="form-group row">
                                <label for="delivery" class="col-md-4 col-form-label text-md-right">{{ __('Delivery') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="delivery" id="delivery" value="yes">
                                        <label class="form-check-label">Yes</label>
                                    </div>
        
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="delivery" id="delivery" value="no">
                                        <label class="form-check-label">No</label>
                                    </div>

                                    @error('delivery')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="available_from_date" class="col-md-4 col-form-label text-md-right">{{ __('Date available from') }}</label>

                                <div class="col-md-6">
                                    <input id="available_from_date" type="date" class="form-control @error('available_from_date') is-invalid @enderror" name="available_from_date" value="{{ old('available_from_date') }}" required autocomplete="available_from_date">

                                    @error('available_from_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                                                    
                            <div class="form-group row">
                                <label for="available_to_date" class="col-md-4 col-form-label text-md-right">{{ __('Date available to') }}</label>

                                <div class="col-md-6">
                                    <input id="available_to_date" type="date" class="form-control @error('available_to_date') is-invalid @enderror" name="available_to_date" value="{{ old('available_to_date') }}" required autocomplete="available_to_date">

                                    @error('available_to_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type of vehicle') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control form-control-sm" name="type" value="{{ old('type') }}">
                                        @foreach($types as $type)
                                            <option value="{{$type->type_id}}">{{$type->type}}</option>
                                        @endforeach
                                    </select>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>                           

                            <div class="form-group row">
                                <label for="vehicle_photo" class="col-md-4 col-form-label text-md-right">{{ __('Upload your vehicle photo') }}</label>

                                <div class="custom-file col-md-6">
                                    <input id="vehicle_photo" type="file" class="form-control @error('vehicle_photo') is-invalid @enderror" name="vehicle_photo" value="{{ old('vehicle_photo') }}" required autocomplete="vehicle_photo">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Maximum size 5MB.
                                    </small>

                                    @error('vehicle_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        
                        </div><!--/tab-pane-->
          
                    </div><!--/tab-content-->
        
                </div><!--/col-6-->
            </form>
    </div><!--/row-->
</div><!--container-->
@endsection