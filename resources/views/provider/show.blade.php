@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    Providers
@endsection

@section('title')
  Providers
  <small></small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">Provider</li>
@endsection

@section('content')


<div class="row">
    <div class="col-xs-12">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-red-active">
              <h3 class="widget-user-username">{{$provider->user->name}} {{$provider->user->lastname}}</h3>
              <h5 class="widget-user-desc">Provider</h5>
          </div>
          <div class="widget-user-image">
              <img class="img-circle" src="{{url($provider->user->image)}}" alt="User Avatar">
          </div>
          <div class="box-footer">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Name</h5>
                          <span class="description-text">{{$provider->user->name}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Lastname</h5>
                          <span class="description-text">{{$provider->user->lastname}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Email</h5>
                          <span class="description-text">{{$provider->user->email}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Username</h5>
                          <span class="description-text">{{$provider->user->username}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Credential</h5>
                          <span class="description-text">{{$provider->user->credential}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Phone</h5>
                          <span class="description-text">{{$provider->user->phone}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-xs-12">
                      <div class="description-block">
                          <h5 class="description-header">Address</h5>
                          <span class="description-text">{{$provider->user->address}}</span>
                      </div><!-- /.description-block -->
                  </div><!-- /.col -->

              </div><!-- /.row -->
          </div>
      </div><!-- /.widget-user -->
    </div><!-- /.col -->
</div>

<div class="row"  style="margin-top:10px;">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of my Workers</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="" class="table asc table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Tags</th>
                            <th>Age</th>
                            <th>Price / Hour</th>
                            @if (Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Provider")
                            <th class="not-export-col">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workers as $worker)
                            <tr>
                            <td><a href="{{route($routeGenerator->make('worker.show', auth()->user()), $worker->id)}}">{{$worker->user->name}}</a></td>
                            <td><a href="{{route($routeGenerator->make('worker.show', auth()->user()), $worker->id)}}">{{$worker->user->lastname}}</td>
                            <td>{{$worker->user->email}}</td>
                            <td>
                              @if($worker->sex == 0)
                                Male
                              @else
                                Female
                              @endif
                            </td>
                            <td>
                              @foreach($worker->tags as $tag)
                                | {{$tag->name}} |
                              @endforeach
                            </td>
                            <td>{{$worker->age}}</td>
                            <td>{{$worker->price}} $</td>
                            @if (Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Provider")
							              <td>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="{{route($routeGenerator->make('worker.edit', auth()->user()), $worker->id)}}" class="btn btn-block btn-primary" data-toggle="confirmation">Edit</a>
                                    </div>
                                </div>
                            </td>
                            @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Tags</th>
                            <th>Age</th>
                            <th>Price</th>
                            @if (Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Provider")
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
