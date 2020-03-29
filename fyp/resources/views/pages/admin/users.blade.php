@extends('layouts.master')
@section('user')
    <div class="row"  style="padding:10px;">

        <h3>Users</h3>
        <div style="padding-left:900px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add new user
            </button>
        </div>
        <div class="col-sm-12 " style="padding:10px;">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif            
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <td style="display:none;">
                            ID
                        </td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Password</td>
                        <td>is_admin</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td style="display:none;">
                            {{$user->id}}
                        </td>
                        <td>{{$user->name}} </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->is_admin}}</td>
                        <td>
                            <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                @csrf
                                <button type="button" class="btn btn-primary" href="">Edit</button>
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>    
                        </td>  
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body"> --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
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

                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                {{-- </div>
            </div>--}}
        </div> 
      </div>
    </div>
  </div>
@endsection