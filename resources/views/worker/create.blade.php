@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    Workers
@endsection

@section('title')
  Worker
  <small>New</small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">Create Worker</li>
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
              <h3 class="box-title">Create New Worker</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(array('route' => $routeGenerator->make('worker.post', auth()->user()), 'id'=>'form_semester', 'class'=> 'form-horizontal' )) !!}
              <div class="box-body">

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    {!! Form::text('name', null, array('class' => 'form-control', 'placeholder'=>'Name...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Lastname</label>
                  <div class="col-sm-10">
                  {!! Form::text('lastname', null, array('class' => 'form-control', 'placeholder'=>'Lastname...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    {!! Form::email('email', null, array('class' => 'form-control', 'placeholder'=>'Email...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                  {!! Form::text('username', null, array('class' => 'form-control', 'placeholder'=>'Username...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Credential</label>
                  <div class="col-sm-10">
                  {!! Form::text('credential', null, array('class' => 'form-control', 'placeholder'=>'Credential...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                  {!! Form::text('phone', null, array('class' => 'form-control', 'placeholder'=>'Phone...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                  {!! Form::text('address', null, array('class' => 'form-control', 'placeholder'=>'Address...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                  {!! Form::text('description', null, array('class' => 'form-control', 'placeholder'=>'Description...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Age</label>
                  <div class="col-sm-10">
                  {!! Form::number('age', null, array('class' => 'form-control', 'placeholder'=>'Age...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Price Per Hour</label>
                  <div class="col-sm-10">
                  {!! Form::number('price', null , array('class' => 'form-control', 'placeholder'=>'Price...' ) ) !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Sex</label>
                  <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" id="optionsRadios1" value="True" checked>
                            Female
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" id="optionsRadios2" value="False">
                            Male
                        </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Monday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="monday_active">
                          </span>
                      {!! Form::number('monday_hours', null , array('class' => 'form-control', 'placeholder'=>'Monday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tuesday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="tuesday_active">
                          </span>
                      {!! Form::number('tuesday_hours', null , array('class' => 'form-control', 'placeholder'=>'Tuesday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Wednesday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="wednesday_active">
                          </span>
                      {!! Form::number('wednesday_hours', null , array('class' => 'form-control', 'placeholder'=>'Wednesday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Thursday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="thursday_active">
                          </span>
                      {!! Form::number('thursday_hours', null , array('class' => 'form-control', 'placeholder'=>'Thursday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Friday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="friday_active">
                          </span>
                      {!! Form::number('friday_hours', null , array('class' => 'form-control', 'placeholder'=>'Friday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Saturday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="saturday_active">
                          </span>
                      {!! Form::number('saturday_hours', null , array('class' => 'form-control', 'placeholder'=>'Saturday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sunday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="sunday_active">
                          </span>
                      {!! Form::number('sunday_hours', null , array('class' => 'form-control', 'placeholder'=>'Sunday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tags</label>
                    <div class="col-sm-10">
                        @foreach ($tags as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="tag_{{$tag->id}}">
                                {{$tag->name}}
                              </label>
                        </div>
                        @endforeach
                    </div>

                </div>


              </div><!-- /.box-body -->
              <div class="box-footer">
                <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right" data-toggle="confirmation">Create</button>
              </div><!-- /.box-footer -->
            {!! Form::close() !!}
          </div><!-- /.box -->
    </div>
</div>


@endsection
