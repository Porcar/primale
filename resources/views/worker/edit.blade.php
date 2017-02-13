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
          {!! Form::model($worker, array('route' => array($routeGenerator->make('worker.update', auth()->user()), $worker->id),'method' => 'put',  'id'=>'form_event','class'=>'form-horizontal', 'files'=>true) ) !!}
              <div class="box-body">

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    {!! Form::text('name', $worker->user->name, array('class' => 'form-control', 'placeholder'=>'Name...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Lastname</label>
                  <div class="col-sm-10">
                  {!! Form::text('lastname', $worker->user->lastname, array('class' => 'form-control', 'placeholder'=>'Lastname...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Credential</label>
                  <div class="col-sm-10">
                  {!! Form::text('credential', $worker->user->credential, array('class' => 'form-control', 'placeholder'=>'Credential...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                  {!! Form::text('phone', $worker->user->phone, array('class' => 'form-control', 'placeholder'=>'Phone...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                  {!! Form::text('address', $worker->user->adress, array('class' => 'form-control', 'placeholder'=>'Address...', 'required'=> 'True') ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                  {!! Form::text('description', null , array('class' => 'form-control', 'placeholder'=>'Description...' ) ) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Age</label>
                  <div class="col-sm-10">
                  {!! Form::number('age', null , array('class' => 'form-control', 'placeholder'=>'Age...' ) ) !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Sex</label>
                  <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" id="optionsRadios1" value="True" @if ($worker->sex==True) checked @endif>
                            Female
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" id="optionsRadios2" value="False" @if ($worker->sex==False) checked @endif>
                            Male
                        </label>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="location_workersplace" @if ($worker->location_workersplace==True) checked @endif>
                                Workers home
                              </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="location_clientsplace" @if ($worker->location_clientsplace==True) checked @endif>
                                Clients home
                              </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="location_hotel" @if ($worker->location_hotel==True) checked @endif>
                                Hotel
                              </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="location_other" @if ($worker->location_other==True) checked @endif>
                                Other
                              </label>
                        </div>

                    </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Monday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="monday_active" @if($worker->schedule->monday_active) checked @endif>
                          </span>
                      {!! Form::number('monday_start_hour', $worker->schedule->monday_start_hour , array('class' => 'form-control', 'placeholder'=>'Monday start Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                      {!! Form::number('monday_end_hour',  $worker->schedule->monday_end_hour , array('class' => 'form-control', 'placeholder'=>'Monday end Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tuesday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="tuesday_active" @if($worker->schedule->tuesday_active) checked @endif>
                          </span>
                      {!! Form::number('tuesday_start_hour',  $worker->schedule->tuesday_start_hour  , array('class' => 'form-control', 'placeholder'=>'Tuesday start Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                      {!! Form::number('tuesday_end_hour', $worker->schedule->tuesday_start_hour , array('class' => 'form-control', 'placeholder'=>'Tuesday end Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Wednesday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="wednesday_active" @if($worker->schedule->wednesday_active) checked @endif>
                          </span>
                      {!! Form::number('wednesday_start_hour', $worker->schedule->wednesday_start_hour , array('class' => 'form-control', 'placeholder'=>'Wednesday start Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                      {!! Form::number('wednesday_end_hour', $worker->schedule->wednesday_end_hour , array('class' => 'form-control', 'placeholder'=>'Wednesday end Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Thursday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="thursday_active" @if($worker->schedule->thursday_active) checked @endif>
                          </span>
                      {!! Form::number('thursday_start_hour', $worker->schedule->thursday_start_hour , array('class' => 'form-control', 'placeholder'=>'Thursday start Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                      {!! Form::number('thursday_end_hour', $worker->schedule->thursday_end_hour , array('class' => 'form-control', 'placeholder'=>'Thursday end Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Friday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="friday_active" @if($worker->schedule->friday_active) checked @endif>
                          </span>
                      {!! Form::number('friday_start_hour', $worker->schedule->friday_start_hour , array('class' => 'form-control', 'placeholder'=>'Friday start Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                      {!! Form::number('friday_end_hour', $worker->schedule->friday_end_hour , array('class' => 'form-control', 'placeholder'=>'Friday end Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Saturday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="saturday_active" @if($worker->schedule->saturday_active) checked @endif>
                          </span>
                      {!! Form::number('saturday_start_hour', $worker->schedule->saturday_start_hour , array('class' => 'form-control', 'placeholder'=>'Saturday start Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                      {!! Form::number('saturday_end_hour', $worker->schedule->saturday_end_hour , array('class' => 'form-control', 'placeholder'=>'Saturday end Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sunday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="sunday_active" @if($worker->schedule->sunday_active) checked @endif>
                          </span>
                      {!! Form::number('sunday_start_hour', $worker->schedule->sunday_start_hour , array('class' => 'form-control', 'placeholder'=>'Sunday start Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                      {!! Form::number('sunday_end_hour', $worker->schedule->sunday_end_hour , array('class' => 'form-control', 'placeholder'=>'Sunday end Hours...', 'min'=>0, 'max'=>23 ) ) !!}
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tags</label>
                  <div class="col-sm-4">
                      @foreach ($tags as $tag)
                                        <div class="input-group">
                          <span class="input-group-addon">
                            <input type="checkbox" name="tag_{{$tag->id}}">
                          </span>
                          <span class="input-group-addon">  {{$tag->name}}

                            @if ($tag->normal == True)
                              - Normal
                            @endif
                            @if ($tag->sado == True)
                              - Sado
                            @endif
                            @if ($tag->experience == True)
                              - Experience
                            @endif
                           </span>
                      {!! Form::number('price_'.$tag->id, null , array('class' => 'form-control', 'placeholder'=>'Price...', 'step'=>"0.1" ) ) !!}

                    </div>

                    @endforeach
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
