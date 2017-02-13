
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Tags</label>
                  <div class="col-sm-4">
                      @foreach ($worker->tagsworkers as $tag)
                      <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="tag_{{$tag->id}}">
                          </span>
                          <span class="input-group-addon">  {{$tag->tag->name}}

                            @if ($tag->tag->normal == True)
                              - Normal
                            @endif
                            @if ($tag->tag->sado == True)
                              - Sado
                            @endif
                            @if ($tag->tag->experience == True)
                              - Experience
                            @endif
                           </span>
                           <span class="input-group-addon">  {{$tag->price}}</span>
                    </div>
                    @endforeach
                  </div>
                </div>



                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Observation</label>
                  <div class="col-sm-10">
                    {!! Form::text('observation', null, array('class' => 'form-control', 'placeholder'=>'Observation...') ) !!}
                  </div>
                </div>


                <input type="hidden" name="worker_id" value="{{$worker->id}}">


                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Days</label>
                  <div class="col-sm-2">
                      <select name="days" class="form-control" required="">
                        @if($worker->schedule->monday_active == True)
                          <option value="Monday">Monday</option>
                        @endif
                        @if($worker->schedule->tuesday_active == True)
                          <option value="Tuesday">Tuesday</option>
                        @endif
                        @if($worker->schedule->wednesday_active == True)
                          <option value="Wednesday">Wednesday</option>
                        @endif
                        @if($worker->schedule->thursday_active == True)
                          <option value="Thursday">Thursday</option>
                        @endif
                        @if($worker->schedule->friday_active == True)
                          <option value="Friday">Friday</option>
                        @endif
                        @if($worker->schedule->saturday_active == True)
                          <option value="Saturday">Saturday</option>
                        @endif
                        @if($worker->schedule->sunday_active == True)
                          <option value="Sunday">Sunday</option>
                        @endif
                      </select>
                  </div>
                  <div class="col-sm-2">

                      {!! Form::number('hours', null , array('class' => 'form-control', 'placeholder'=>'Hours...', 'required'=> 'True', 'min'=>'1', 'max'=>'24' ) ) !!}



                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Location</label>
                  <div class="col-sm-2">
                      <select name="location" class="form-control" required="">
                        @if($worker->location_workersplace == True)
                          <option value="Workers Place">Workers Place</option>
                        @endif
                        @if($worker->location_clientsplace == True)
                          <option value="Clients Place">Clients Place</option>
                        @endif
                        @if($worker->location_hotel == True)
                          <option value="Hotel">Hotel</option>
                        @endif
                        @if($worker->location_other == True)
                          <option value="Other">Other</option>
                        @endif
                      </select>
                  </div>
                </div>


{{--
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Date</label>
                  <div class ="col-sm-10">
                  {!! Form::date('date', \Carbon\Carbon::now(), array('class' => 'form-control', 'placeholder'=>'Date...' ) ) !!}
                  </div>
                </div>

--}}

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
