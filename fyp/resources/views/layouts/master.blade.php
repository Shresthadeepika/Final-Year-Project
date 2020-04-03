@include('includes.sidebar')
@include('includes.header')
@include('includes.footer')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | Vehicle Rental</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{URL::to('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{URL::to('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::to('css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{URL::to('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet')}}">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->

      @yield('header')
      <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @yield('sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Main content -->
          @yield('content')
          @yield('user')
          @yield('newUser')
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


      <!-- Main Footer -->
      @yield('footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{URL::to('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{URL::to('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{URL::to('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::to('js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{URL::to('js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{URL::to('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{URL::to('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{URL::to('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{URL::to('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{URL::to('plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{URL::to('js/dashboard2.js')}}"></script>
</body>
</html>