@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    Workers
@endsection

<style>

div.c-wrapper{
    width: 80%; /* for example */
    margin: auto;
}

.carousel-inner > .item > img,
.carousel-inner > .item > a > img{
width: 100%; /* use this, or not */
margin: auto;
}

</style>

@section('title')
  Workers
  <small></small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">Worker</li>
@endsection

@section('content')


  <div class="row">
          <div class="col-xs-12">
            @if (Auth::user()->role->name != "Worker")
              <a href="{{route($routeGenerator->make('worker.create', auth()->user()))}}" class="btn btn-block btn-danger">Hire Worker</a>
            @endif
          </div>
  </div>

  <br>

  <div class="row">
          <div class="col-xs-12">
            @if (Auth::user()->role->name != "Worker")
              <a href="{{route($routeGenerator->make('sexdate.create', auth()->user()))}}" class="btn btn-block btn-danger">Sexdate</a>
            @endif
          </div>
  </div>

  <br>

<div class="row">
    <div class="col-xs-12">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-red-active">
              <h3 class="widget-user-username">{{$user->name}} {{$user->lastname}}</h3>
              <h5 class="widget-user-desc">Worker</h5>
          </div>
          <div class="widget-user-image">
              <img class="img-circle" src="{{url($user->image)}}" alt="User Avatar">
          </div>
          <div class="box-footer">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Name</h5>
                          <span class="description-text">{{$user->name}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Lastname</h5>
                          <span class="description-text">{{$user->lastname}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Email</h5>
                          <span class="description-text">{{$user->email}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Username</h5>
                          <span class="description-text">{{$user->username}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Credential</h5>
                          <span class="description-text">{{$user->credential}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Phone</h5>
                          <span class="description-text">{{$user->phone}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Address</h5>
                          <span class="description-text">{{$user->address}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->

                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Address</h5>
                          <span class="description-text">{{$user->address}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Description</h5>
                          <span class="description-text">{{$user->worker->description}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Age</h5>
                          <span class="description-text">{{$user->worker->age}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Price</h5>
                          <span class="description-text">{{$user->worker->price}} $ / Hour</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Sex</h5>
                          <span class="description-text">
                              @if($user->worker->sex==1)
                              Female
                              @else
                              Male
                              @endif
                          </span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Manager</h5>
                          <span class="description-text">{{$user->worker->provider->user->name}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Working Days</h5>
                          <span class="description-text">
                              @if($user->worker->monday_active==1)
                                Monday : {{$user->worker->monday_hours}} Hours <br>
                              @endif
                              @if ($user->worker->tuesday_active==1)
                                Tuesday: {{$user->worker->tuesday_hours}} Hours <br>
                              @endif
                              @if ($user->worker->wednesday_active==1)
                                Wednesday: {{$user->worker->wednesday_hours}} Hours <br>
                              @endif
                              @if ($user->worker->thursday_active==1)
                                Thursday: {{$user->worker->thursday_hours}} Hours<br>
                              @endif
                              @if ($user->worker->friday_active==1)
                                Friday: {{$user->worker->friday_hours}} Hours<br>
                              @endif
                              @if ($user->worker->saturday_active==1)
                                Saturday: {{$user->worker->saturday_hours}} Hours<br>
                              @endif
                              @if ($user->worker->sunday_active==1)
                                Sunday: {{$user->worker->sunday_hours}} Hours<br>
                              @endif
                          </span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->

                <div class="c-wrapper">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="display: inline-block; width:100%;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      @if($user->worker->image1)
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      @endif
                      @if($user->worker->image2)
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      @endif
                      @if($user->worker->image3)
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      @endif
                      @if($user->worker->image4)
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      @endif
                      @if($user->worker->image5)
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      @endif
                      @if($user->worker->image6)
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      @endif

                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                      @if($user->worker->image1)
                      <div class="item active">
                        <img src="{{url($user->worker->image1)}}" style="height: 100%;">
                      </div>
                      @endif
                      @if($user->worker->image2)
                      <div class="item">
                        <img src="{{url($user->worker->image2)}}" style="height: 100%;">
                      </div>
                      @endif
                      @if($user->worker->image3)
                      <div class="item">
                        <img src="{{url($user->worker->image3)}}"style="height: 100%;">
                      </div>
                      @endif
                      @if($user->worker->image4)
                      <div class="item">
                        <img src="{{url($user->worker->image4)}}"style="height: 100%;">
                      </div>
                      @endif
                      @if($user->worker->image5)
                      <div class="item">
                        <img src="{{url($user->worker->image5)}}"style="height: 100%;">
                      </div>
                      @endif
                      @if($user->worker->image6)
                      <div class="item">
                        <img src="{{url($user->worker->image6)}}"style="height: 100%;">
                      </div>
                      @endif
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  </div>

                  <div style="text-align: center">
                    <iframe width="80%" height="80%" src="http://www.youtube.com/embed/{{$user->worker->video}}" frameborder="0" allowfullscreen></iframe>
                  </div>
              </div><!-- /.row -->
          </div>





      </div><!-- /.widget-user -->
    </div><!-- /.col -->
</div>



@endsection
