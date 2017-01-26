@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')

@section('page')
    Admin
@endsection

@section('title')
    Super
    <small>Administrator</small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">Administrator</li>
@endsection

@section('content')


    <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3><i class="fa fa-users"> + </i></h3>
                  <p>New Provider</p>
              </div>
              <div class="icon">
                  <i class="fa fa-users"></i>
              </div>
              <a href="{{route($routeGenerator->make('provider.create', auth()->user()))}}" class="small-box-footer">More Information <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><i class="fa fa-money"> + </i></h3>
                    <p>New Worker</p>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
                <a href="{{route($routeGenerator->make('worker.create', auth()->user()))}}" class="small-box-footer">More Information <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><i class="fa fa-child"> + </i></h3>
                    <p>New Client</p>
                </div>
                <div class="icon">
                    <i class="fa fa-child"></i>
                </div>
                <a href="{{route($routeGenerator->make('client.create', auth()->user()))}}" class="small-box-footer">More Information <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

    </div><!-- /.row -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
              <div class="inner">
                  <h3><i class="fa fa-users"></i></h3>
                  <p>Providers</p>
              </div>
              <div class="icon">
                  <i class="fa fa-users"></i>
              </div>
              <a href="{{route($routeGenerator->make('provider', auth()->user()))}}" class="small-box-footer">More Information <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><i class="fa fa-money"></i></h3>
                    <p>Workers</p>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
                <a href="{{route($routeGenerator->make('worker', auth()->user()))}}" class="small-box-footer">More Information <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><i class="fa fa-child"></i></h3>
                    <p>Clients</p>
                </div>
                <div class="icon">
                    <i class="fa fa-child"></i>
                </div>
                <a href="{{route($routeGenerator->make('client', auth()->user()))}}" class="small-box-footer">More Information <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->

    </div><!-- /.row -->

@endsection
