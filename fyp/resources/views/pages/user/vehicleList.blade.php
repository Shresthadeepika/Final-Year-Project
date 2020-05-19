@extends('layouts.userMaster')
@section('vehicle_detail')
<div class="col-lg-12">
    <div class="row">
        <div class="col-md-8">
            <h4>Vehicles Available</h4>
          </div>
    </div>      
    @foreach($vehicles as $vehicle)
      <div class="card shadow mb-4">
        <div class="card rounded">
            <div class="card-image">
              <div class="col-md-8">
                <img class="img-fluid rounded" src="/uploads/vehicle/{{$vehicle->vehicle_photo}}" height="262" width="440" alt="Vehicle Photo" />
              </div> 
              <div class="col-md-4">
                {{--<div class="row"> --}}
                  <span class="card-heading-badge">{{$vehicle->company}}</span>
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
              </div>
            </div>
        </div>
      </div>
    @endforeach

</div>    
    
@endsection