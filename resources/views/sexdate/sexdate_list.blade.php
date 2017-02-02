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
                            <th>Date</th>
                            <th>Hour</th>
                            <th>User</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sexdate as $sexdate)
                        <tr>
                            <td>{{$sexdate->id}}</td>
                            <td>{{$sexdate->created_at->toFormattedDateString()}}</td>
                            <td>{{$sexdate->created_at->toTimeString()}}</td>
                            <td>{{$sexdate->worker->user->name}}</td>
                            <td> {{$sexdate->observation}} </td>
                        </tr>
                        @endforeach
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
