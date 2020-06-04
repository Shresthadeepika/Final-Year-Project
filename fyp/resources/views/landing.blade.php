@extends('layouts.main')
@section('landing')
<!--== SlideshowBg Area Start ==-->
    <section id="slideslow-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="slideshowcontent">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <h1>RENT IT TODAY!</h1>
                                <p>RENT ANY VEHICLE IN JUST 3 STEPS. <br> STARTING FROM AS LOW AS Rs.300 A DAY.</p>
                                <form action="{{route('login')}}" style="padding-left:43%; ">
                                    <div class="bookcar-btn bookinput-item">
                                        <a class="btn" href="#" style="color: white">RENT VEHICLE</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== SlideshowBg Area End ==-->

    <!--== About Us Area Start ==-->
    <section id="about-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>About us</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Rent and give out any vehicles for rent.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- About Content Start -->
                <div class="col-lg-6">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="about-content">
                                <p>Rent IT is a startup company started by pass out students of Islington college of 2018 with the goal of providing a trustworthy rental vehicles. 
                                    It started with the goal of providing rental vehicles to people at a affordable price. Over the years it extended its service to delivery for vehicles which are rented.
                                    Also we started a new idea of allowing people to give their vehicles for rent and allowing them to choose the people who can rent them. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Content End -->

                <!-- About Video Start -->
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="img/home-2-about.png" alt="JSOFT">
                    </div>
                </div>
                <!-- About Video End -->
            </div>
        </div>
    </section>
    <!--== About Us Area End ==-->

    <!--== Services Area Start ==-->
    <section id="service-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our Services</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

			<!-- Service Content Start -->
			<div class="row">
				<div class="col-lg-11 m-auto text-center">
					<div class="service-container-wrap">
						<!-- Single Service Start -->
						<div class="service-item">
							<i class="fa fa-car"></i>
							<h3>RENT VEHICLE </h3>
							<p>Rent different vehicles for any amount of time from wide range of vehicles available.</p>
						</div>
						<!-- Single Service End -->

						<!-- Single Service Start -->
						<div class="service-item">
							<i class="fa fa-ambulance"></i>
							<h3>Give out for rent</h3>
							<p>List out your vehicles for rent and choose tenants for your vehicle yourself.</p>
						</div>
						<!-- Single Service End -->

						<!-- Single Service Start -->
						<div class="service-item">
							<i class="fa fa-map-marker"></i>
							<h3>DELIVERY</h3>
							<p>Many of the vehicles available for delivery and meet the vehicle owners in person.</p>
						</div>
						<!-- Single Service End -->

						<!-- Single Service Start -->
						<div class="service-item">
							<i class="fa fa-leaf"></i>
							<h3>insurance</h3>
							<p>Insurance for vehicles in collaboration with Nepal Life Insurance Coming Soon...</p>
						</div>
						<!-- Single Service End -->
					</div>
				</div>
			</div>
			<!-- Service Content End -->
        </div>
    </section>
    <!--== Services Area End ==-->

    <!--== Fun Fact Area Start ==-->
    <section id="funfact-area" class="overlay section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 col-md-12 m-auto">
                    <div class="funfact-content-wrap">
                        <div class="row">
                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-smile-o"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <p><span class="counter">350</span>+</p>
                                        <h4>SATISFIED CLIENTS</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->

                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-car"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <p><span class="counter">150</span>+</p>
                                        <h4>VEHICLES IN STOCK</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->

                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <p><span class="counter">50</span>+</p>
                                        <h4>RETURNING CLIENTS</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Fun Fact Area End ==-->

       <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                        <div class="row">
                            @foreach($vehicles as $vehicle)
                                @if($loop->iteration <= 4)
                                    <!-- Single Car Start -->
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-car-wrap">
                                            <img class="img-fluid rounded" src="/uploads/vehicle/{{$vehicle->vehicle_photo}}" height="262" width="440" alt="Vehicle Photo" />
                                            <div class="car-list-info without-bar">
                                                <h2>{{$vehicle->company}} </h2> <h2>{{$vehicle->model}}</h2>
                                                <h5>{{$vehicle->price_per_day}} /per day</h5>
                                                <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean inorci luctus et ultrices posuere cubilia.</p>
                                                <ul class="car-info-list">
                                                    <li>{{$vehicle->year}}</li>
                                                    <li>{{$vehicle->availability_status}}</li>
                                                    <li>Delivery</li>
                                                </ul>
                                                </p>
                                                <a href="{{route('user.rent.form',$vehicle->vehicle_id)}}" class="rent-btn">Rent IT</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Car End -->
                                @endif
                            @endforeach
                            <!-- Single Car Start -->
                            {{-- <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <div class="car-list-thumb car-thumb-2"></div>
                                    <div class="car-list-info without-bar">
                                        <h2><a href="#">Aston Martin One-77</a></h2>
                                        <h5>39$ Rent /per a day</h5>
                                        <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean inorci luctus et ultrices posuere cubilia.</p>
                                        <ul class="car-info-list">
                                            <li>AC</li>
                                            <li>Diesel</li>
                                            <li>Auto</li>
                                        </ul>
                                        <p class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star unmark"></i>
                                        </p>
                                        <a href="#" class="rent-btn">Book It</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Single Car End -->

                            <!-- Single Car Start -->
                            {{-- <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <div class="car-list-thumb car-thumb-3"></div>
                                    <div class="car-list-info without-bar">
                                        <h2><a href="#">Aston Martin One-77</a></h2>
                                        <h5>39$ Rent /per a day</h5>
                                        <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean inorci luctus et ultrices posuere cubilia.</p>
                                        <ul class="car-info-list">
                                            <li>AC</li>
                                            <li>Diesel</li>
                                            <li>Auto</li>
                                        </ul>
                                        <p class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star unmark"></i>
                                        </p>
                                        <a href="#" class="rent-btn">Book It</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Single Car End -->

                            <!-- Single Car Start -->
                            {{-- <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <div class="car-list-thumb car-thumb-4"></div>
                                    <div class="car-list-info without-bar">
                                        <h2><a href="#">Aston Martin One-77</a></h2>
                                        <h5>39$ Rent /per a day</h5>
                                        <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean inorci luctus et ultrices posuere cubilia.</p>
                                        <ul class="car-info-list">
                                            <li>AC</li>
                                            <li>Diesel</li>
                                            <li>Auto</li>
                                        </ul>
                                        <p class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star unmark"></i>
                                        </p>
                                        <a href="#" class="rent-btn">Book It</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Single Car End -->
                        </div>
                    </div>

                    <!-- Page Pagination Start -->
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{route('user.list.vehicles')}}">More</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Page Pagination End -->
                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->
@endsection