@section('sidebar')
<html>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="{{URL::to('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">Admin</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              {{-- <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index2.html" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v3</p>
                    </a>
                  </li>
                </ul>
              </li> --}}
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tree"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Users Info</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="{{route('admin.addNewUser')}}" class="nav-link">
                      <i class="fas fa-user-plus"></i>
                      <p>Add new user</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin.userDetails')}}" class="nav-link">
                      <i class="fas fa-users-cog"></i>
                      <p>User Details</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tractor"></i>
                  <p>Type of vehicle</p>
                  <i class="right fas fa-angle-left"></i>
              </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="{{route('admin.newType')}}" class="nav-link">
                      <i class="fas fa-ambulance"></i>
                      <p>Add new vehicle type</p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a href="{{route('admin.showType')}}" class="nav-link">
                      <i class="fas fa-car-alt"></i>
                      <p>Vehicle types</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-truck-loading"></i>
                  <p>
                    Vehicles Info
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin.new.vehicle')}}" class="nav-link">
                      <i class="fas fa-ambulance"></i>
                      <p>Add new Vehicle</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('admin.show.vehicle')}}" class="nav-link">
                      <i class="fas fa-truck-monster"></i>
                      <p>Vehicle info</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
              <a href="{{route('admin.show.rent')}}" class="nav-link">
                  <i class="nav-icon fas fa-hand-holding-usd"></i>
                  <p>
                    Rented vehicles
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>
                    Listed out vehicles
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Forms
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>General Elements</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/advanced.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Advanced Elements</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/editors.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Editors</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/validation.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Validation</p>
                    </a>
                  </li>
                </ul> 
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Tables
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                {{-- <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/tables/simple.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Simple Tables</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/tables/data.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>DataTables</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/tables/jsgrid.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>jsGrid</p>
                    </a>
                  </li>
                </ul>
              </li> --}}
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <br>
        <br>
        <!-- /.sidebar -->
      </aside>
</html>
@endsection