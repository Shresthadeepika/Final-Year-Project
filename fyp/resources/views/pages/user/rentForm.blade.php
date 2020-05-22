@extends('layouts.userMaster')
@section('vehicle_rent')
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
            <div class="card">
                <div class="card-header">{{ __('Please fill this form to rent the vehicle') }}</div>

                <div class="card-body"> 
                    <form method="POST" action="{{-- route('admin.vehicle.update',$vehicle->vehicle_id) --}}" enctype="multipart/form-data">
                        @csrf
                    <fieldset disabled>
                    <div class="col col-lg-6">
                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{$vehicle->company}}" required autocomplete="company" autofocus>

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
                                <input id="model" type="model" class="form-control @error('model') is-invalid @enderror" name="model" value="{{$vehicle->model }}" required autocomplete="model">

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
                                <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{$vehicle->year }}" required autocomplete="year">

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
                                <input id="number_plate" type="text" class="form-control @error('number_plate') is-invalid @enderror" name="number_plate" value="{{$vehicle->number_plate }}" required autocomplete="number_plate">

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
                                <input id="license" type="text" class="form-control @error('license') is-invalid @enderror" name="license" value="{{ $vehicle->license }}" required autocomplete="license">

                                @error('license')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-6">

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price per day') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $vehicle->price_per_day }}" required autocomplete="price">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type of Vehicle') }}</label>

                            <div class="col-md-6">
                                <select class="form-control form-control-sm" name="type" value="{{ $vehicle->type}}">
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
                        @if ($listed)
                        <div class="form-group row">
                            <label for="delivery" class="col-md-4 col-form-label text-md-right">{{ __('Delivery') }}</label>

                            <div class="col-md-6">
                                <input id="delivery" type="text" class="form-control @error('delivery') is-invalid @enderror" name="delivery" value="{{ $listed->delivery }}" required autocomplete="delivery">

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
                                <input id="available_from_date" type="date" class="form-control @error('available_from_date') is-invalid @enderror" name="available_from_date" value="{{ $listed->available_from_date }}" required autocomplete="available_from_date">

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
                                <input id="available_to_date" type="date" class="form-control @error('available_to_date') is-invalid @enderror" name="available_to_date" value="{{ $listed->available_to_date }}" required autocomplete="available_to_date">

                                @error('available_to_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                    </div>
                    </fieldset>   
                    
                    <div class="form-group row">
                        <label for="rented_date" class="col-md-4 col-form-label text-md-right">{{ __('Date of rent') }}</label>

                        <div class="col-md-6">
                            <input id="rented_date" type="date" class="form-control @error('rented_date') is-invalid @enderror" name="rented_date" value="{{ old('rented_date') }}" required autocomplete="rented_date">

                            @error('rented_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration of rent') }}</label>

                        <div class="col-md-6">
                            <input id="duration" type="text" oninput="calculateAmount()" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}" required autocomplete="duration" placeholder="In days">

                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_price" class="col-md-4 col-form-label text-md-right">{{ __('Total Price') }}</label>

                        <div class="col-md-6">
                            <input id="total_price" type="text" class="form-control @error('total_price') is-invalid @enderror" name="total_price" value="{{ old('total_price') }}" required autocomplete="total_price" readonly placeholder="Please enter duration first.">

                            @error('total_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                        <div class="col-md-6">
                            <select class="form-control form-control-sm" name="type" value="{{ old('payment_method') }}">
                                <option value="On delivery">On delivery</option>
                                <option value="After rent period">After rent period</option>
                                <option value="Advance of Rs.1000">Advance of Rs.1000</option>
                                <option value="On person">On person</option>
                            </select>
                            @error('payment_method')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <script>
                        function calculateAmount() {
                            var price = document.getElementById("price").value;
                            var duration = document.getElementById("duration").value;
                            var total_price = parseInt(duration) * parseInt(price);
                            // if (isNan(total_price)) {
                            //     document.getElementById('total_pice').value = "Enter duration first.";
                            // }
                             /*display the result*/
                                var total = document.getElementById('total_price');
                                total.value = total_price;

                        
                        }
                    </script>
                    

                        <br>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-link" aria-hidden="true"></span> 
                                    {{ __('Rent it') }}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('user.vehicle.details',$vehicle->vehicle_id)}}" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-remove"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                {{-- </div>--}}
            </div> 
        </div>
    </div>
</div>    
@endsection