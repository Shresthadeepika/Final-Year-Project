@section('footer')
<!-- Footer Widget Start -->
        <div class="footer-widget-area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>About Us</h2>
                            <div class="widget-body">
                                <span class="title-line" style="color:yellow;"><i class="fa fa-car"></i> RENT IT </span>
                                <p>Website with the goal of providing rental vehicles to people at a affordable price and also give vehicles for rent conveniently.</p>

                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->

                    <!-- Single Footer Widget Start -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h2>Become a member</h2>
                            <div class="widget-body">
                                <ul class="get-touch">
                                    <li>
                                        <a href="{{route('login')}}"><i class="fa fa-user"></i> Login </a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.add.listed')}}"><i class="fa fa-mobile"></i> Become a dealer </a>
                                    </li>
                                    <li><i class="fa fa-envelope"></i> rentit@gmail.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget End -->
                </div>
            </div>
        </div>
        <!-- Footer Widget End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Rent IT <i class="fa fas-heart-o" aria-hidden="true"></i> </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->

@endsection