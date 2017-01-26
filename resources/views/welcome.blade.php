

@inject('routeGenerator', 'App\Services\RouteGeneratorService')


<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v3.6.3, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v3.6.3, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-anglo-png-sin-fondo-428x128-66.png" type="image/x-icon">
  <meta name="description" content="">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900">
  <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">



</head>
<body>
  <section class="mbr-section mbr-section-full mbr-parallax-background" id="header4-9" style="background-image: url(assets/images/mbr-2000x1325.jpg);">
      <div class="mbr-table-cell">
          <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 255, 255);"></div>
          <div class="container">
              <div class="row">
                  <div class="col-md-8 col-md-offset-4 text-xs-right">

                      <h1 class="mbr-section-title display-1">Primale</h1>
                      <p class="lead">Cuando quieras...donde quieras...</p>

                      <div class="mbr-buttons--left">
                        @if(Auth::user())
                        <a class="btn btn-lg btn-danger" href="{{route($routeGenerator->make('', auth()->user()))}}">Enter</a>
                        @else
                        <a class="btn btn-lg btn-danger" href="{{ route('login') }}">Login</a>
                        @endif
                        <a class="btn btn-lg btn-white" href="{{route('logout')}}">Register</a>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/SmoothScroll.js"></script>
  <script src="assets/viewportChecker/jquery.viewportchecker.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/theme/js/script.js"></script>


  <input name="animation" type="hidden">
  </body>
</html>
