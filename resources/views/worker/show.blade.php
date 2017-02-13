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
                          <h5 class="description-header">Working Days</h5>
                          <span class="description-text">
                              @if($worker->schedule->monday_active==1)
                                Monday : {{$worker->schedule->monday_hours}} Hours <br>
                              @endif
                              @if ($worker->schedule->tuesday_active==1)
                                Tuesday: {{$worker->schedule->tuesday_hours}} Hours <br>
                              @endif
                              @if ($worker->schedule->wednesday_active==1)
                                Wednesday: {{$worker->schedule->wednesday_hours}} Hours <br>
                              @endif
                              @if ($worker->schedule->thursday_active==1)
                                Thursday: {{$worker->schedule->thursday_hours}} Hours<br>
                              @endif
                              @if ($worker->schedule->friday_active==1)
                                Friday: {{$worker->schedule->friday_hours}} Hours<br>
                              @endif
                              @if ($worker->schedule->saturday_active==1)
                                Saturday: {{$worker->schedule->saturday_hours}} Hours<br>
                              @endif
                              @if ($worker->schedule->sunday_active==1)
                                Sunday: {{$worker->schedule->sunday_hours}} Hours<br>
                              @endif
                          </span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->

                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Tags</h5>
                          <span class="description-text">
                            @foreach($worker->tagsworkers as $tag)
                              |{{$tag->tag->name}}|
                            @endforeach
                            </span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
      </div><!-- /.widget-user -->
    </div><!-- /.col -->
</div>


@if (Auth::user()->role->name == "Admin")
<div class="row">
        <div class="col-xs-12">
          @if (Auth::user()->role->name == "Admin" OR Auth::user()->role->name == "Client")
            <a href="{{route($routeGenerator->make('image.create', auth()->user()), $worker->id)}}" class="btn btn-block btn-danger">New Image</a>
          @endif
        </div>
</div>
<br>
<div class="row">
        <div class="col-xs-12">
          @if (Auth::user()->role->name == "Admin" OR Auth::user()->role->name == "Client")
            <a href="{{route($routeGenerator->make('video.create', auth()->user()), $worker->id)}}" class="btn btn-block btn-danger">New Video</a>
          @endif
        </div>
</div>
@endif
<div class="row"  style="margin-top:10px;">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of Media</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="" class="table asc1 table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Image</th>
                            <th>Video</th>
                            @if (Auth::user()->role->name == "Admin")
                            <th class="not-export-col">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($worker->medias()->get() as $media)
                            <tr>
                            <td>@if($media->image)
                              <img src="{{url($media->image)}}" class="img-circle" alt="User Image" style="max-width: 40px;">
                            @endif
                            </td>
                            <td>@if($media->video)
                              <a href="https://www.youtube.com/watch?v={{($media->video)}}" target="_blank">https://www.youtube.com/watch?v={{($media->video)}}</a>
                            @endif
                            </td>
                            @if (Auth::user()->role->name == "Admin")
							              <td>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="{{route($routeGenerator->make('media.delete', auth()->user()), $media->id)}}" class="btn btn-block btn-primary" data-toggle="confirmation">Delete</a>
                                    </div>
                                </div>
                            </td>
                            @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>Image</th>
                            <th>Video</th>
                            @if (Auth::user()->role->name == "Admin")
                            <th class="not-export-col hidden">Actions</th>
                            @endif
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->



@endsection
