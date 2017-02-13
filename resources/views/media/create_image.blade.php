@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    Images
@endsection

@section('title')
  Media
  <small>Images</small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">New Image</li>
@endsection

@section('content')


  <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Create New Image</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
        {!! Form::open(array('route' => $routeGenerator->make('image.post', auth()->user()), 'id'=>'form_semester', 'class'=> 'form-horizontal','files'=>true )) !!}

        <input type="hidden" class="form-control" id="worker_id" name="worker_id" value="{{$worker->id}}" required>


  <div class="box-body">
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Picture</label>
      <div class="col-sm-10">
            <input type="file" id="image" name="image">
            <p class="help-block">Picture</p>
      </div>
    </div>
</div><!-- /.box-body -->


<div class="box-footer">
  <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
  <button type="submit" class="btn btn-info pull-right" data-toggle="confirmation">Create</button>
</div><!-- /.box-footer -->
{!! Form::close() !!}
</div><!-- /.box -->


@endsection
