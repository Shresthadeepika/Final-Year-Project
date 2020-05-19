@extends('layouts.userMaster')
@section('userContent')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>
  <!-- Content Row -->
  <div class="row" style="padding-left:10px;">
    <!-- Image  -->
    <div class="container w-auto p-3">
      <img src="/img/bg4.jpg" alt="image" height="360" width="1000" class="rounded">
      <div style="position: absolute; top: 40%; left: 58%; transform: translate(-50%, -50%);">
          <p class="lead text-muted font-italic">
            <h3>Rent IT </h3>
          </p>
      </div>
    </div> <!-- Image  -->   
    
    <!-- Content Column -->
    <!--vehicle-->
    <div class="col-lg-8 mb-4">
      <div class = "row" >
        <div class="col-md-8">
          <h4>Vehicles Available</h4>
        </div>
        <div class="col-md-4" style="padding-left:20px;">
          <a class="btn btn-primary" href="#">
            <span class="glyphicon glyphicon-th" aria-hidden="true"></span> More
          </a>
        </div>
      </div> <!--row-->

      <!-- Description -->
    @foreach($vehicles as $vehicle)
      @if($loop->iteration <= 4)
      <div class="card shadow mb-4">
        <div class="card rounded">
            <div class="card-image">
              <div class="col-sm-8">
                <img class="img-fluid rounded" src="/uploads/vehicle/{{$vehicle->vehicle_photo}}" height="262" width="440" alt="Vehicle Photo" />
              </div> 
              <div class="col-sm-4">
                {{--<div class="row"> --}}
                  <span class="card-heading-badge">{{$vehicle->company}}</span>
                  {{-- <br><br>
                  <span class="card-detail-badge">Type  : {{$vehicle->type}}</span> --}}
                  <br><br>
                  <span class="card-detail-badge">Model : {{$vehicle->model}}</span>
                  <br><br>
                  <span class="card-detail-badge">Year  : {{$vehicle->year}}</span>
                  <br><br>
                  <span class="card-detail-badge">Number Plate  : {{$vehicle->number_plate}}</span>
                  <br><br>
                  <span class="card-detail-badge">Price per day(in Rs.)  : {{$vehicle->price_per_day}}</span>
                  <br><br>
                  <a href="{{route('user.vehicle.details',$vehicle->vehicle_id)}}"> Detail... </a>
                  <hr>

                  <div class="col-auto">
                    <a class="btn btn-success" href="#">
                      <span class="glyphicon glyphicon-link" aria-hidden="true"></span> Rent it
                    </a>
                  </div>

                {{--</div> --}}
              </div>
            </div>
        </div>
      </div>
    @endif
    @endforeach

    </div> <!--vehicle-->

    <!--earining-->
    <div class="col-lg-4 mb-4">
      <!--income-->          
      <div class="row" style="padding-bottom:20px;">
            <div class="col">
              <div class="card border-left-primary shadow h-30">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar" fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div> <!-- income --->

      <!-- Payment -->
      <div class="row" style="padding-bottom:20px;">
            <div class="col">
              <div class="card border-left-success shadow h-30">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Payment</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div> <!-- payment --->

      <!-- Rented -->
      <div class="row" style="padding-bottom:20px;">
            <div class="col">
              <div class="card border-left-warning shadow h-30">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Vehicles Rented</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-truck fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div> <!-- rented --->

      <!--listed -->
      <div class="row" style="padding-bottom:20px;">
            <div class="col">
              <div class="card border-left-warning shadow h-30">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Vehicles Listed</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-car fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div> <!-- listed --->
    
    
    </div> <!--earining-->

  
  </div> <!-- Content Row -->

@endsection
