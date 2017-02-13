@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    Videos
@endsection

@section('title')
  Media
  <small>Videos</small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">New Video</li>
@endsection

@section('content')




    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Create New Video</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
          {!! Form::open(array('route' => $routeGenerator->make('video.post', auth()->user()), 'id'=>'form_semester', 'class'=> 'form-horizontal' )) !!}
    
          <input type="hidden" class="form-control" id="worker_id" name="worker_id" value="{{$worker->id}}" required>

    <div class="box-body">
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Video</label>
        <div class="col-sm-10">
        {!! Form::text('video',null , array('class' => 'form-control', 'placeholder'=>'Video URL' ) ) !!}
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
