
<!DOCTYPE html>
    <html lang="en">
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <head>
      <meta charset="utf-8" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/frontend-assets/dashboard/img/apple-icon.png')}}">
      <link rel="icon" type="image/png" href="{{asset('/frontend-assets/dashboard/img/favicon.png')}}">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>
       Technician Portal
      </title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <!--     Fonts and icons     -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <!-- CSS Files -->

      <link href="{{asset('/frontend-assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet" />
      <link href="{{asset('/frontend-assets/dashboard/css/paper-dashboard.css?v=2.0.0')}}" rel="stylesheet" />
      <!-- CSS Just for demo purpose, don't include it in your project -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
      <link href="{{asset('/frontend-assets/dashboard/css/custom.css')}}" rel="stylesheet" />

      <link href="{{asset('admin-assets/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
      <link href="{{asset('admin-assets/datatable/jquery.dataTables.min.css')}}" rel="stylesheet" />
       @yield('style')
    </head>
  <body>
    @include('frontend.technician.includes.sidebar')

    <!-- @yield('inner-header') -->

    @yield('content')

    @include('frontend.technician.includes.footer')


    <!--Scroll to top Button-->

    @yield('page-footer')



    <!--   Core JS Files   -->
    <script src="{{asset('/frontend-assets/dashboard/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('/frontend-assets/dashboard/js/core/popper.min.js')}}"></script>
    <script src="{{asset('/frontend-assets/dashboard/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('/frontend-assets/dashboard/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->

    <!-- Chart JS -->
    <script src="{{asset('/frontend-assets/dashboard/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('/frontend-assets/dashboard/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('/frontend-assets/dashboard/js/paper-dashboard.min.js?v=2.0.0')}}" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('/frontend-assets/dashboard/demo/demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
      });


    </script>
  {{-- //datatable --}}
  <script src="{{asset('admin-assets/datatable/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin-assets/datatable/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin-assets/js/datatable.js')}}"></script>
    @yield('script')
  </body>
</html>
