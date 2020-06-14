@extends('layouts.userMaster')
@section('profile')
<div class="container bootstrap snippet">
    <div class="row">
    <div class="col-sm-10"><h3>User Profile</h3></div>
    	{{-- <div class="col-sm-2"><a href="#" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="{{URL::to('http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100')}}"></a></div> --}}
    </div>
    <hr>
    <div class="row" style="font-weight: bold;">
  		<div class="col-sm-3"><!--left col-->
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

      <div class="text-center" >
        <img src="{{URL::to('http://ssl.gstatic.com/accounts/ui/avatar_2x.png')}}" class="avatar img-circle img-thumbnail" alt="avatar">
        <br>
        <br>
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">
      </div><br>

               
          <div class="panel panel-default">
            <div class="panel-heading">License <i class="fa fa-link fa-1x"></i></div>
          <div class="panel-body"><a href="storage/uploads/license/{{$user->license}}">{{$user->license}}</a></div>
          </div>
          
          
          {{-- <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul>  --}}
               
          {{-- <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div> --}}
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
          <div class="tab-content">
            <div class="tab-pane active" id="home">
            <form method="POST" action="{{route('user.profile.update')}}" enctype="multipart/form-data" >
                    @csrf
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="name"><h4>Name</h4></label>
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                              @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="contact_num"><h4>Phone</h4></label>
                              <input id="contact_num" type="text" class="form-control @error('contact_num') is-invalid @enderror" name="contact_num" value="{{ $user->contact_num }}" required autocomplete="contact_num">

                                @error('contact_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="gender"><h4>Location</h4></label>
                              <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address">

                              @error('address')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group">
                          
                        <div class="col-xs-6">
                            <label for="gender"><h4>Gender</h4></label>
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
            
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-success" type="submit">
                                      <i class="glyphicon glyphicon-ok"></i> Save
                                </button>
                                <a href="{{route('user.profile')}}"class="btn btn-danger" role="button">
                                    <i class="glyphicon glyphicon-remove"></i> Cancel
                                  </a>
                            </div>
                      </div>
                    
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->


@endsection