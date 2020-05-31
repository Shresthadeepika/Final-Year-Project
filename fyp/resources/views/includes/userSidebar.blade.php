@section('userSidebar')
    <html>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="width: 16%;">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-snowplow "></i>
            </div>
            <div class="sidebar-brand-text mx-3">Rent iT</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->

        <!-- Heading -->
        <div class="sidebar-heading">
            User
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
        <a class="nav-link" href="{{route('user.dashboard')}}" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('user.profile')}}" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-address-card"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages"aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-truck-loading"></i>
                <span>Vehicles</span>
            </a>
                <div id="collapsePages" class="collapse show " aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ml-3 my-1" href="{{ route('user.show.rent') }}">
                        <i class="fas fa-fw fa-car"></i> Rented vehicles
                    </a>
                    <a class="nav-link ml-3 my-1" href="{{route('user.view.listed')}}">
                        <i class="fas fa-fw fa-paper-plane"></i> Listed vehicles
                    </a>
                    <a class="nav-link ml-3 my-1" href="{{route('user.show.request')}}">
                        <i class="fas fa-fw fa-hand-holding"></i> Rent Requests
                    </a>
                </nav>
                </div>
            <div class="collapse-divider"></div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
    </html>
@endsection

