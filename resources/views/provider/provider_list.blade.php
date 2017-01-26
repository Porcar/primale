@extends('layouts.baseadmin')
@include('layouts.tables')
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
    <li class="active">List of Providers</li>
@endsection

@section('content')
<div class="row">
        <div class="col-xs-12">
          @if (Auth::user()->role->name == "Admin")
            <a href="{{route($routeGenerator->make('provider.create', auth()->user()))}}" class="btn btn-block btn-danger">New Provider</a>
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
                <h3 class="box-title">List of Providers</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="" class="table asc1 table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            @if (Auth::user()->role->name == "Admin")
                            <th class="not-export-col">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                            <td><a href="{{route($routeGenerator->make('provider.show', auth()->user()), $user->id)}}">{{$user->name}}</a></td>
                            <td><a href="{{route($routeGenerator->make('provider.show', auth()->user()), $user->id)}}">{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            @if (Auth::user()->role->name == "Admin")
							              <td>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="{{route($routeGenerator->make('provider.edit', auth()->user()), $user->id)}}" class="btn btn-block btn-primary" data-toggle="confirmation">Edit</a>
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
