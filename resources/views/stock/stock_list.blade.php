@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@include('layouts.tables')
@section('page')
    Stock
@endsection

@section('title')
    Stock
    <small>Items List</small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">Items List</li>
@endsection

@section('content')
<div class="row">
        <div class="col-xs-12">
            <a href="{{route($routeGenerator->make('stock.create', auth()->user()))}}" class="btn btn-block btn-primary">New Item</a>
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
                <h3 class="box-title">List of Items</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="" class="table asc1 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Points</th>
                            @if (Auth::user()->role->name == "Admin")
                            <th class="not-export-col">Actions</th>
                          @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stock)

                            <tr>
                            <td>{{$stock->name}}</td>
                            <td>{{$stock->description}}</td>
                            <td>{{$stock->quantity}}</td>
                            <td>{{$stock->price}}</td>
                            <td>{{$stock->points}}</td>
                            @if (Auth::user()->role->name == "Admin")
							                       <td>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="{{route('admin.stock.edit',$stock->id)}}" class="btn btn-block btn-primary" data-toggle="confirmation">Edit</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="{{route('admin.stock.delete',$stock->id)}}" class="btn btn-block btn-danger" data-toggle="confirmation">Delete</a>
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
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Points</th>
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
