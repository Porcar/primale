@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    Tags
@endsection

@section('title')
    Tags
    <small>Tags Edit</small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">Tags Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert</h4>
                {{ Session::get('message') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-xs-12">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Alert</h4>
                        {{ $error }}
                    </div>
                @endforeach
                </div>
            </div>
        @endif
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Stock</h3>
            </div><!-- /.box-header -->
            <!-- form start -->

              {!! Form::model($tag, array('route' => array($routeGenerator->make('tag.update', auth()->user()), $tag->id),'method' => 'put',  'id'=>'form_event','class'=>'form-horizontal') ) !!}



              <div class="box-body">

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    {!! Form::text('name', null, array('class' => 'form-control', 'placeholder'=>'Name...', 'required'=> 'True') ) !!}
                  </div>
                </div>
              </div><!-- /.box-body -->
              <div class="box-footer">

                <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>

                <button type="submit" class="btn btn-info pull-right" data-toggle="confirmation">Edit</button>
              </div><!-- /.box-footer -->
            {!! Form::close() !!}
          </div><!-- /.box -->
    </div>
</div>

@endsection
