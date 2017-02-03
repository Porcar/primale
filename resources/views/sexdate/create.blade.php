
@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')
@section('page')
    Sexdate
@endsection

@section('title')
    Sexdate Test
    <small>Create New Sexdate</small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">Create Sexdate</li>
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
              <h3 class="box-title">Create Sexdate</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
              {!! Form::open(array('route' => $routeGenerator->make('sexdate.post', auth()->user()), 'id'=>'form_semester', 'class'=> 'form-horizontal' )) !!}

              <div class="box-body">

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Observation</label>
                  <div class="col-sm-10">
                    {!! Form::text('observation', null, array('class' => 'form-control', 'placeholder'=>'Observation...') ) !!}
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Hours</label>
                  <div class="col-sm-10">
                    {!! Form::number('hours', null, array('class' => 'form-control', 'placeholder'=>'Hours', 'required'=> 'True', 'min'=>'1', 'max'=>'23') ) !!}
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Worker</label>
                  <div class="col-sm-10">
                      <select name="worker_id" class="form-control" required="">
                        @foreach($workers as $worker)
                          <option value="{{$worker->id}}">{{$worker->user->name}} {{$worker->user->lastname}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>

                @if($worker->monday_active == True)
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Monday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="monday_active">
                          </span>
                      {!! Form::text('monday_hours', null , array('class' => 'form-control', 'placeholder'=>'Monday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
              @endif
              @if($worker->tuesday_active== True)
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tuesday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="tuesday_active">
                          </span>
                      {!! Form::text('tuesday_hours', null , array('class' => 'form-control', 'placeholder'=>'Tuesday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
              @endif
              @if($worker->wednesday_active == True)
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Wednesday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="wednesday_active">
                          </span>
                      {!! Form::text('wednesday_hours', null , array('class' => 'form-control', 'placeholder'=>'Wednesday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
              @endif
              @if($worker->thursday_active == True)
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Thursday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="thursday_active">
                          </span>
                      {!! Form::text('thursday_hours', null , array('class' => 'form-control', 'placeholder'=>'Thursday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
              @endif
              @if($worker->friday_active == True)
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Friday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="friday_active">
                          </span>
                      {!! Form::text('friday_hours', null , array('class' => 'form-control', 'placeholder'=>'Friday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
              @endif
              @if($worker->saturday_active == True)
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Saturday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="saturday_active">
                          </span>
                      {!! Form::text('saturday_hours', null , array('class' => 'form-control', 'placeholder'=>'Saturday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
              @endif
              @if($worker->sunday_active == True)
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sunday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="sunday_active">
                          </span>
                      {!! Form::text('sunday_hours', null , array('class' => 'form-control', 'placeholder'=>'Sunday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
              @endif



                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Date</label>
                  <div class ="col-sm-10">
                  {!! Form::date('date', \Carbon\Carbon::now(), array('class' => 'form-control', 'placeholder'=>'Date...' ) ) !!}
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
