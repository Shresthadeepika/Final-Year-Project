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
              <hr>
            <form method="POST" action="#" enctype="multipart/form-data">
              @csrf      
              <fieldset disabled>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="name"><h4>Name</h4></label>
                          <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name" placeholder="Name" >
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="contact_num"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="contact_num" value="{{$user->contact_num}}" id="contact_num" placeholder="enter contact number" >
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="your@email.com" value="{{$user->email}}" >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="gender"><h4>Location</h4></label>
                          <input type="address" class="form-control" id="address" placeholder="somewhere" value="{{$user->address}}">
                          </div>
                      </div>
                      <div class="form-group">
                          
                        <div class="col-xs-6">
                            <label for="gender"><h4>Gender</h4></label>
                        <input type="gender" class="form-control" id="gender" placeholder="someone" value="{{$user->gender}}">
                        </div>
                    </div>
                </fieldset> 
                    
              </form>
              <div class="form-group">
                <div class="col-xs-12">
                     <br>
                     {{-- <button type="submit" class="btn btn-primary" ><i class="glyphicon glyphicon-pencil"></i> Edit</button> --}}
                     <a href="{{route('user.edit.profile')}}"class="btn btn-primary" role="button">
                      <i class="glyphicon glyphicon-pencil"></i> Edit
                    </a>
                 </div>
                 </div>
              
              <hr>
              
             </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->


@endsection