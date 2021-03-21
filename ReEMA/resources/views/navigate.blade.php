<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('assets/img/favicon.png')}} " rel="icon">
  <link href="{{ url('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <title>@yield('title')</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}"  rel="stylesheet">
  <link href= "{{ url('assets/vendor/ionicons/css/ionicons.min.css')}}"  rel="stylesheet">
  <link href= "{{ url('assets/vendor/animate.css/animate.min.css')}}"   rel="stylesheet">
  <link href="{{ url('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{url('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}"rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency - v2.2.1
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>
<body>
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container"> 
         @yield('navigate') 
       </div>
</nav>
 <div>
	@yield('content')
</div>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

<!-- Vendor JS Files -->
  <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{url('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ url('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ url('assets/vendor/scrollreveal/scrollreveal.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('assets/js/main.js')}}"></script>

</body>
</html>
