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
            @if (Auth::user()->role->name == "Admin" OR Auth::user()->role->name == "Client")
              <a href="{{route($routeGenerator->make('sexdate.createwithclient', auth()->user()), $worker->id)}}" class="btn btn-block btn-danger">New Sexdate</a>
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
              <h3 class="widget-user-username">{{$worker->user->name}} {{$worker->user->lastname}}</h3>
              <h5 class="widget-user-desc">Worker</h5>
          </div>
          <div class="widget-user-image">
              <img class="img-circle" src="{{url($worker->user->image)}}" alt="User Avatar">
          </div>
          <div class="box-footer">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Name</h5>
                          <span class="description-text">{{$worker->user->name}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Lastname</h5>
                          <span class="description-text">{{$worker->user->lastname}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Email</h5>
                          <span class="description-text">{{$worker->user->email}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Username</h5>
                          <span class="description-text">{{$worker->user->username}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Credential</h5>
                          <span class="description-text">{{$worker->user->credential}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Phone</h5>
                          <span class="description-text">{{$worker->user->phone}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Address</h5>
                          <span class="description-text">{{$worker->user->address}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->

                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Address</h5>
                          <span class="description-text">{{$worker->user->address}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Description</h5>
                          <span class="description-text">{{$worker->description}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Age</h5>
                          <span class="description-text">{{$worker->age}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Price</h5>
                          <span class="description-text">{{$worker->price}} $ / Hour</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Sex</h5>
                          <span class="description-text">
                              @if($worker->sex==1)
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
                          <span class="description-text">{{$worker->provider->user->name}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Working Days</h5>
                          <span class="description-text">
                              @if($worker->monday_active==1)
                                Monday : {{$worker->monday_hours}} Hours <br>
                              @endif
                              @if ($worker->tuesday_active==1)
                                Tuesday: {{$worker->tuesday_hours}} Hours <br>
                              @endif
                              @if ($worker->wednesday_active==1)
                                Wednesday: {{$worker->wednesday_hours}} Hours <br>
                              @endif
                              @if ($worker->thursday_active==1)
                                Thursday: {{$worker->thursday_hours}} Hours<br>
                              @endif
                              @if ($worker->friday_active==1)
                                Friday: {{$worker->friday_hours}} Hours<br>
                              @endif
                              @if ($worker->saturday_active==1)
                                Saturday: {{$worker->saturday_hours}} Hours<br>
                              @endif
                              @if ($worker->sunday_active==1)
                                Sunday: {{$worker->sunday_hours}} Hours<br>
                              @endif
                          </span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->

                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Tags</h5>
                          <span class="description-text">
                            @foreach($worker->tags as $tag)
                              |{{$tag->name}}|
                            @endforeach
                            </span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->


<br>
                <div class="c-wrapper">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="display: inline-block; width:100%;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      @if($worker->image1)
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      @endif
                      @if($worker->image2)
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      @endif
                      @if($worker->image3)
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      @endif
                      @if($worker->image4)
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      @endif
                      @if($worker->image5)
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      @endif
                      @if($worker->image6)
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      @endif

                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                      @if($worker->image1)
                      <div class="item active">
                        <img src="{{url($worker->image1)}}" style="height: 100%;">
                      </div>
                      @endif
                      @if($worker->image2)
                      <div class="item">
                        <img src="{{url($worker->image2)}}" style="height: 100%;">
                      </div>
                      @endif
                      @if($worker->image3)
                      <div class="item">
                        <img src="{{url($worker->image3)}}"style="height: 100%;">
                      </div>
                      @endif
                      @if($worker->image4)
                      <div class="item">
                        <img src="{{url($worker->image4)}}"style="height: 100%;">
                      </div>
                      @endif
                      @if($worker->image5)
                      <div class="item">
                        <img src="{{url($worker->image5)}}"style="height: 100%;">
                      </div>
                      @endif
                      @if($worker->image6)
                      <div class="item">
                        <img src="{{url($worker->image6)}}"style="height: 100%;">
                      </div>
                      @endif
                    </div>
                  @if($worker->image1)
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  @endif
                  </div>
                  </div>

                  <div style="text-align: center">
                    <iframe width="80%" height="80%" src="http://www.youtube.com/embed/{{$worker->video}}" frameborder="0" allowfullscreen></iframe>
                  </div>
              </div><!-- /.row -->
          </div>





      </div><!-- /.widget-user -->
    </div><!-- /.col -->
</div>



@endsection
