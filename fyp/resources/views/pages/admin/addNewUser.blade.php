@extends('layouts.master')
@section('newUser')
    <div class="container">
        <div class="container col-md-6">
            <div class="row justify-content-center">
                <div class="col-sm-8 offset-sm-2">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session ('success')}}
                        </div>
                    @endif
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                </div>
                <div>
                    {{-- <div class="card-header">Fill the user info</div>

                    <div class="card-body"> --}}
                        <form action="#" method="post" enctype="multipart/form-data">
                            {{-- {{dd($posts,$process)}} --}}
                            @csrf
                            <div class="form-group row">
                                <label for="name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" autofocus>
                                <span style="color: red">{{$errors->first('first_name')}}</span>
                            </div>

                            <div class="form-group row">
                                <label for="name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" autofocus>
                                <span style="color: red">{{$errors->first('last_name')}}</span>
                            </div>

                            <div class="form-group row">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                <span style="color: red">{{$errors->first('email')}}</span>
                            </div>

                            <div class="form-group row">
                                <label for="contact">Contact Number</label>
                                <input type="text" name="contact_no" id="contact_no" class="form-control" value="{{ old('contact_no') }}">
                                <span style="color: red">{{$errors->first('contact_no')}}</span>
                            </div>

                            <div class="form-group row">
                                <label for="Address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                                <span style="color: red">{{$errors->first('address')}}</span>
                            </div>

                            <div class="form-group row">
                                <label>Gender</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="internRequired" id="internRequired" value="male">
                                <label class="form-check-label">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="internRequired" id="internRequired" value="female">
                                <label class="form-check-label">Female</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="internRequired" id="internRequired" value="other">
                                <label class="form-check-label">Others</label>
                            </div>                            
                            <br>

                            <div class="form-group row">
                                <label for="CV">Upload your license  *(Max. 5MB)</label>
                                <input type="file" name="license" id="license" class="form-control" >
                                <span style="color: red">{{$errors->first('CV')}}</span>
                            </div>
                            <div class="form-group float-right">
                                <button class="btn btn-primary float-right">Submit</button>
                            </div>
                        </form>
                    {{-- </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

