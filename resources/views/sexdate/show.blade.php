@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    SexDate
@endsection

@section('title')
  SexDate
  <small></small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">SexDate</li>
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-red-active">
              <h3 class="widget-user-username">{{$sexdate->client->user->name}} {{$sexdate->client->user->lastname}}</h3>
              <h5 class="widget-user-desc">SexDate</h5>
          </div>
          <div class="widget-user-image">
              <img class="img-circle" src="{{url($sexdate->client->user->image)}}" alt="User Avatar">
          </div>
          <div class="box-footer">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Client Name</h5>
                          <span class="description-text">{{$sexdate->client->user->name}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Workers Name</h5>
                          <span class="description-text">{{$sexdate->worker->user->name}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Hours</h5>
                          <span class="description-text">{{$sexdate->hours}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Total Price</h5>
                          <span class="description-text">{{$totalprice}}</span>

                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Date</h5>
                          <span class="description-text">{{$sexdate->day}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Clients Phone</h5>
                          <span class="description-text">{{$sexdate->client->user->phone}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Observation</h5>
                          <span class="description-text">{{$sexdate->observation}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Location</h5>
                          <span class="description-text">{{$sexdate->location}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Tags</h5>
                          <span class="description-text">
                            @foreach($sexdate->tagsworkers as $tag)
                              | {{$tag->tag->name}} |
                            @endforeach
                            </span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->




              </div><!-- /.row -->
          </div>
      </div><!-- /.widget-user -->
    </div><!-- /.col -->
</div>

<div class="row">
        <div class="col-xs-12">
          @if (Auth::user()->role->name == "Admin" OR Auth::user()->role->name == "Client")
            <a href="{{route($routeGenerator->make('sexdate.delete', auth()->user()), $sexdate->id)}}" class="btn btn-block btn-danger" data-toggle="confirmation">CANCEL Sexdate</a>
          @endif
        </div>
</div>


@endsection
