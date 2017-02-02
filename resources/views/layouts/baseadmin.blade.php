<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" >
    <title>Primale | @yield('page')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar 2.2.5-->
    {!! Html::style('plugins/fullcalendar/fullcalendar.min.css') !!}
    {!! Html::style('plugins/fullcalendar/fullcalendar.print.css') !!}
    <!-- Theme style -->
    {!! Html::style('dist/css/AdminLTE.min.css') !!}
    <!-- DataTables -->
    {!! Html::style('plugins/DataTables/datatables.css') !!}
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter-->
    {!! Html::style('dist/css/skins/skin-red.min.css') !!}

  </head>

  <body class="hold-transition skin-red sidebar-mini" onload="init();">
    <div class="wrapper">

      @include('layouts.header')
      <!-- Left side column. contains the logo and sidebar -->
      @include('layouts.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('title')
          </h1>
          <ol class="breadcrumb">
            @yield('level')
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          @yield('content')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      @include('layouts.footer')

   </div><!-- ./wrapper -->
   <!-- REQUIRED JS SCRIPTS -->

   <!-- jQuery 2.1.4 -->
   {!! Html::script('plugins/jQuery/jQuery-2.1.4.min.js') !!}
   <!-- Bootstrap 3.3.5 -->
   {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
   <!-- AdminLTE App -->
   {!! Html::script('dist/js/app.min.js') !!}
   <!-- jQuery UI 1.11.4 -->
   {!! Html::script('plugins/jQueryUI/jquery-ui.min.js') !!}
   <!--   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
   <!-- Slimscroll -->
   {!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
   <!-- FastClick -->
   {!! Html::script('plugins/fastclick/fastclick.min.js') !!}
   <!-- fullCalendar 2.2.5 -->
   {!! Html::script('plugins/moment/moment.min.js') !!}
   <!-- {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js') !!} -->
   <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> -->
   {!! Html::script('plugins/fullcalendar/fullcalendar.min.js') !!}
   <!--Bootstrap Confirmations -->
    {!! Html::script('plugins/confirmation/bootstrap-confirmation.js') !!}
   <!-- AdminLTE for demo purposes -->
   {!! Html::script('dist/js/demo.js') !!}
   <!-- DataTables -->
   {!! Html::script('plugins/DataTables/datatables.js') !!}

   <!--DataTables -->
   @yield('tables')

    <!-- Confirmations -->
    <script>
      $('[data-toggle="confirmation"]').confirmation({

        href: function(elem){
          return $(elem).attr('href');
        },
        animation: true,
        singleton: true,
        popout: true,
        placement: 'left'

      });

  </script>

<!-- /Confirmations -->



 </body>
</html>
