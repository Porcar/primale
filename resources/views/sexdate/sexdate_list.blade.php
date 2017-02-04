@extends('layouts.baseadmin')
@include('layouts.tables')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    SexDates
@endsection

@section('title')
    SexDates
    <small>SexDates Information</small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">SexDates</li>
@endsection

@section('content')

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

<br>


<div class="row"  style="margin-top:10px;">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of SexDates</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="" class="table desc table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Day</th>
                            <th>Hours</th>
                            <th>Worker</th>
                            <th>Client</th>
                        </tr>
                    </thead>
                    <tbody>
                   @if(Auth::user()->role->name == "Provider")
                      @foreach ($workers as $worker)
                        @foreach ($worker->sexdates as $sexdate)


                        <tr>
                            <td><a href="{{route($routeGenerator->make('sexdate.show', auth()->user()), $sexdate->id)}}">{{$sexdate->id}}</td>
                            <td>{{$sexdate->day}}</td>
                            <td>{{$sexdate->hours}}</td>
                            <td><a href="{{route($routeGenerator->make('worker.show', auth()->user()), $sexdate->worker->id)}}">{{$sexdate->worker->user->name}}</td>
                            <td>
                              <a href="{{route($routeGenerator->make('client.show', auth()->user()), $sexdate->client->id)}}">
                                {{$sexdate->client->user->name}}
                              </td>
                        </tr>

                            @endforeach
                            @endforeach
                          @else
                              @foreach ($sexdates as $sexdate)


                                <tr>
                                  <td><a href="{{route($routeGenerator->make('sexdate.show', auth()->user()), $sexdate->id)}}">{{$sexdate->id}}</td>
                                    <td>{{$sexdate->day}}</td>
                                    <td>{{$sexdate->hours}}</td>
                                    <td><a href="{{route($routeGenerator->make('worker.show', auth()->user()), $sexdate->worker->id)}}">{{$sexdate->worker->user->name}}</td>

                                      <td>
                                        @if(Auth::user()->role->name != "Client")
                                          <a href="{{route($routeGenerator->make('client.show', auth()->user()), $sexdate->client->id)}}">
                                          @endif
                                          {{$sexdate->client->user->name}}
                                        </td>
                                      </tr>

                                    @endforeach
                          @endif

                    </tbody>
                    <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Date</th>
                          <th>Hour</th>
                          <th>User</th>
                          <th>Description</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->


@endsection
