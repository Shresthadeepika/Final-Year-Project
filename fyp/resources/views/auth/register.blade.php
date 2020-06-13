@extends('layouts.main')
@section('content')
<section id="slideslow-bg" class="section-padding">
    <div class="container justify-content-center" style="width: 800px; height: 500px; " >
        <div class="row" >
            {{-- <div class="col-sm-9 col-md-7 col-lg-5 mx-auto"> --}}
                <div class="card card-signin my-5 " >
                    <div class="card-body" >          
                        <h5 class="card-title text-center">Register</h5>
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col col-lg-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
    
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Your password must be 8-20 characters long but must not contain spaces, special characters, or emoji.
                                    </small>
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div> {{--col-lg-6 --}}

                        <div class="col col-lg-6">
                            
                        <div class="form-group row">
                            <label for="contact_num" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                            <div class="col-md-8">
                                <input id="contact_num" type="text" class="form-control @error('contact_num') is-invalid @enderror" name="contact_num" value="{{ old('contact_num') }}" required autocomplete="contact_num">

                                @error('contact_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
                                    <label class="form-check-label">Male</label>
                                </div>
        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female">
                                    <label class="form-check-label">Female</label>
                                </div>
        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Other">
                                    <label class="form-check-label">Others</label>
                                </div> 

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                           

                        <div class="form-group row">
                            <label for="license" class="col-md-4 col-form-label text-md-right">{{ __('Upload your license') }}</label>

                            <div class="col-md-8">
                                <input id="license" type="file" class="form-control @error('license') is-invalid @enderror" name="license" value="{{ old('license') }}" required autocomplete="license">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Maximum size 5MB.
                                  </small>

                                @error('license')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-md btn-primary btn-block text-uppercase">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        </div> {{--col-lg-6 --}}

                        
                        </div>{{--row--}}
                    </form>
                        
                    </div>
                </div>
            {{-- </div> --}}
        </div>
      </div>    
    
</section>
@endsection
