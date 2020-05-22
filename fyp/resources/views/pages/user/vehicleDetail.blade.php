@extends('layouts.userMaster')
@section('vehicle_detail')
<div class="container">
	
    <div class="card">
        <div class="row">
            <aside class="col-sm-7 ">
                <article class="gallery-wrap"> 
                    <div class="img-big-wrap">
                        <div style="padding: 25px; content-align:center;"> 
                            <img class="img-fluid rounded" src="/uploads/vehicle/{{$vehicle->vehicle_photo}}" height="262" width="440" alt="Vehicle Photo" />
                        </div>
                    </div>                    
                </article> <!-- gallery-wrap .end// -->
            </aside>
            <aside class="col-sm-5">
                <article class="card-body p-1">
                    <h3 class="title mb-3">Vehicle Details</h3>
                    <dl class="param param-feature">
                        <dt>Company</dt>
                        <dd>{{$vehicle->company}}</dd>
                    </dl>  <!-- item-property-hor .// -->

                    <p class="price-detail-wrap"> 
                        <span class="price h3 text-warning"> 
                        <span class="currency">Rs.</span><span class="num">{{$vehicle->price_per_day}}</span>
                        </span> 
                        <span>/per day</span> 
                    </p> <!-- price-detail-wrap .// -->
                    <dl class="item-property">
                        <dt>Number plate</dt>
                        <dd>{{$vehicle->number_plate}}</dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Model</dt>
                    <dd>{{$vehicle->model}}</dd>
                    </dl>  <!-- item-property-hor .// -->
                    <dl class="param param-feature">
                        <dt>Assembled on</dt>
                        <dd>{{$vehicle->year}}</dd>
                    </dl>  <!-- item-property-hor .// -->
                    <dl class="param param-feature">
                        <dt>Delivery</dt>
                        @if ($listed)
                            <dd>{{$listed -> delivery}}</dd>
                        @else
                            <dd>Not mentioned</dd>
                        @endif
                        
                    </dl>  <!-- item-property-hor .// -->
                    @if ($listed)
                        <dl class="param param-feature">
                            <dt>Available From</dt>
                            <dd>{{$listed->available_from_date}}</dd>
                        </dl>  <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <dt>Available To</dt>
                            <dd>{{$listed->available_to_date}}</dd>
                        </dl>  <!-- item-property-hor .// -->
                    @endif
                        <div class="row">
                            <div class="col-sm-5">
                                <dl class="param param-inline">
                                <dt>Type </dt>
                                <dd>
                                <fieldset disabled>
                                    <select class="form-control form-control-sm" name="type" value="{{ $vehicle->type }}">
                                        @foreach($types as $type)
                                            <option value="{{$type->type_id}}">{{$type->type}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                </dd>
                                </dl>  <!-- item-property .// -->
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <hr>
                        <a href="{{route('user.rent.form',$vehicle->vehicle_id)}}" class="btn btn-success text-uppercase">
                            <span class="glyphicon glyphicon-link" aria-hidden="true"></span> Rent it 
                        </a>
                </article> <!-- card-body.// -->
            </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- card.// -->


</div><!--container.//-->
@endsection