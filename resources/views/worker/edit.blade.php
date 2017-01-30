@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    Workers
@endsection

@section('title')
  Worker
  <small>Edit</small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">Edit Worker</li>
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
              <h3 class="box-title">Edit Worker</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
          {!! Form::model($user, array('route' => array($routeGenerator->make('worker.update', auth()->user()), $user->id),'method' => 'put',  'id'=>'form_event','class'=>'form-horizontal') ) !!}
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
                  {!! Form::text('description', $user->worker->description, array('class' => 'form-control', 'placeholder'=>'Description...' ) ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Age</label>
                  <div class="col-sm-10">
                  {!! Form::text('age', $user->worker->age, array('class' => 'form-control', 'placeholder'=>'Age...' ) ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Price Per Hour</label>
                  <div class="col-sm-10">
                  {!! Form::text('price', $user->worker->price, array('class' => 'form-control', 'placeholder'=>'Price...' ) ) !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Sex</label>
                  <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" id="optionsRadios1" value="True" @if ($user->worker->sex==True) checked @endif>
                            Female
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" id="optionsRadios2" value="False" @if ($user->worker->sex==False) checked @endif>
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
                            @if($user->worker->monday_active)
                            <input type="checkbox" name="monday_active" checked>
                            @else
                            <input type="checkbox" name="monday_active">
                            @endif
                          </span>
                      {!! Form::text('monday_hours', $user->worker->monday_hours, array('class' => 'form-control', 'placeholder'=>'Monday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tuesday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($user->worker->tuesday_active)
                            <input type="checkbox" name="tuesday_active" checked>
                            @else
                            <input type="checkbox" name="tuesday_active">
                            @endif
                          </span>
                      {!! Form::text('tuesday_hours', $user->worker->tuesday_hours , array('class' => 'form-control', 'placeholder'=>'Tuesday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Wednesday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($user->worker->wednesday_active)
                            <input type="checkbox" name="wednesday_active" checked>
                            @else
                            <input type="checkbox" name="wednesday_active">
                            @endif
                          </span>
                      {!! Form::text('wednesday_hours', $user->worker->wednesday_hours , array('class' => 'form-control', 'placeholder'=>'Wednesday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Thursday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($user->worker->thursday_active)
                              <input type="checkbox" name="thursday_active" checked>
                            @else
                              <input type="checkbox" name="thursday_active">
                            @endif
                          </span>
                      {!! Form::text('thursday_hours', $user->worker->thursday_hours , array('class' => 'form-control', 'placeholder'=>'Thursday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Friday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($user->worker->friday_active)
                            <input type="checkbox" name="friday_active" checked>
                            @else
                            <input type="checkbox" name="friday_active">
                            @endif
                          </span>
                      {!! Form::text('friday_hours', $user->worker->friday_hours , array('class' => 'form-control', 'placeholder'=>'Friday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Saturday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($user->worker->saturday_active)
                              <input type="checkbox" name="saturday_active" checked>
                            @else
                              <input type="checkbox" name="saturday_active">
                            @endif
                          </span>
                      {!! Form::text('saturday_hours', $user->worker->saturday_hours , array('class' => 'form-control', 'placeholder'=>'Saturday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sunday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($user->worker->sunday_active)
                            <input type="checkbox" name="sunday_active" checked>
                            @else
                            <input type="checkbox" name="sunday_active">
                            @endif
                          </span>
                      {!! Form::text('sunday_hours', $user->worker->sunday_hours , array('class' => 'form-control', 'placeholder'=>'Sunday Hours...' ) ) !!}
                    </div>
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
