@extends('layouts.baseadmin')
@include('layouts.tables')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    Clients
@endsection

@section('title')
  Clients
  <small></small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">List of Clients</li>
@endsection

@section('content')
<div class="row">
        <div class="col-xs-12">
          @if (Auth::user()->role->name != "Client")
            <a href="{{route($routeGenerator->make('client.create', auth()->user()))}}" class="btn btn-block btn-danger">New Client</a>
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
                <h3 class="box-title">List of Clients</h3>
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
                            @if (Auth::user()->role->name == "Admin")
                            <th class="not-export-col">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                            <td><a href="{{route($routeGenerator->make('client.show', auth()->user()), $user->id)}}">{{$user->name}}</a></td>
                            <td><a href="{{route($routeGenerator->make('client.show', auth()->user()), $user->id)}}">{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                              @if($user->client->sex == 0)
                                Male
                              @else
                                Female
                              @endif
                            </td>
                            <td>{{$user->client->age}}</td>
                            @if (Auth::user()->role->name == "Admin")
							              <td>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="{{route($routeGenerator->make('client.edit', auth()->user()), $user->id)}}" class="btn btn-block btn-primary" data-toggle="confirmation">Edit</a>
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
