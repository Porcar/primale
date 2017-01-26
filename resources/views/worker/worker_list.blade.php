@extends('layouts.baseadmin')
@include('layouts.tables')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    Workers
@endsection

@section('title')
  Workers
  <small></small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">List of Workers</li>
@endsection

@section('content')
<div class="row">
        <div class="col-xs-12">
          @if (Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Provider")
            <a href="{{route($routeGenerator->make('worker.create', auth()->user()))}}" class="btn btn-block btn-danger">New Worker</a>
          @endif
        </div>
</div>
<div class="row"  style="margin-top:10px;">
    <div class="col-xs-12">
        @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert</h4>
                {{ Session::get('message') }}
            </div>
        @endif
    </div>
</div>

<div class="row"  style="margin-top:10px;">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of Workers</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="" class="table asc1 table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Age</th>
                            @if (Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Provider")
                            <th class="not-export-col">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                            <td><a href="{{route($routeGenerator->make('worker.show', auth()->user()), $user->id)}}">{{$user->name}}</a></td>
                            <td><a href="{{route($routeGenerator->make('worker.show', auth()->user()), $user->id)}}">{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                              @if($user->worker->sex == 0)
                                Male
                              @else
                                Female
                              @endif
                            </td>
                            <td>{{$user->worker->age}}</td>
                            @if (Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Provider")
							              <td>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="{{route($routeGenerator->make('worker.edit', auth()->user()), $user->id)}}" class="btn btn-block btn-primary" data-toggle="confirmation">Edit</a>
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
                            <th>Age</th>
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
