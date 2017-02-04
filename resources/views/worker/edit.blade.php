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
                  <label for="inputEmail3" class="col-sm-2 control-label">Monday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($worker->monday_active)
                            <input type="checkbox" name="monday_active" checked>
                            @else
                            <input type="checkbox" name="monday_active">
                            @endif
                          </span>
                      {!! Form::number('monday_hours', $worker->monday_hours, array('class' => 'form-control', 'placeholder'=>'Monday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tuesday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($worker->tuesday_active)
                            <input type="checkbox" name="tuesday_active" checked>
                            @else
                            <input type="checkbox" name="tuesday_active">
                            @endif
                          </span>
                      {!! Form::number('tuesday_hours', $worker->tuesday_hours , array('class' => 'form-control', 'placeholder'=>'Tuesday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Wednesday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($worker->wednesday_active)
                            <input type="checkbox" name="wednesday_active" checked>
                            @else
                            <input type="checkbox" name="wednesday_active">
                            @endif
                          </span>
                      {!! Form::number('wednesday_hours', $worker->wednesday_hours , array('class' => 'form-control', 'placeholder'=>'Wednesday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Thursday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($worker->thursday_active)
                              <input type="checkbox" name="thursday_active" checked>
                            @else
                              <input type="checkbox" name="thursday_active">
                            @endif
                          </span>
                      {!! Form::number('thursday_hours', $worker->thursday_hours , array('class' => 'form-control', 'placeholder'=>'Thursday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Friday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($worker->friday_active)
                            <input type="checkbox" name="friday_active" checked>
                            @else
                            <input type="checkbox" name="friday_active">
                            @endif
                          </span>
                      {!! Form::number('friday_hours', $worker->friday_hours , array('class' => 'form-control', 'placeholder'=>'Friday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Saturday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($worker->saturday_active)
                              <input type="checkbox" name="saturday_active" checked>
                            @else
                              <input type="checkbox" name="saturday_active">
                            @endif
                          </span>
                      {!! Form::number('saturday_hours', $worker->saturday_hours , array('class' => 'form-control', 'placeholder'=>'Saturday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sunday</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                          <span class="input-group-addon">
                            @if($worker->sunday_active)
                            <input type="checkbox" name="sunday_active" checked>
                            @else
                            <input type="checkbox" name="sunday_active">
                            @endif
                          </span>
                      {!! Form::number('sunday_hours', $worker->sunday_hours , array('class' => 'form-control', 'placeholder'=>'Sunday Hours...' ) ) !!}
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tags</label>
                    <div class="col-sm-10">
                        @foreach ($tags as $tag)
                        <div class="checkbox">
                            @if($worker->tags()->find($tag->id))
                              <label>
                                <input type="checkbox" name="tag_{{$tag->id}}" checked="">
                                {{$tag->name}}
                              </label>
                            @else
                              <label>
                                <input type="checkbox" name="tag_{{$tag->id}}">
                                {{$tag->name}}
                              </label>
                            @endif
                        </div>
                        @endforeach
                    </div>

                </div>


                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">1st Picture</label>
                  <div class="col-sm-10">
                        <input type="file" id="image" name="image1">
                        <p class="help-block">Image</p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">2nd Picture</label>
                  <div class="col-sm-10">
                        <input type="file" id="image" name="image2">
                        <p class="help-block">Image</p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">3rd Picture</label>
                  <div class="col-sm-10">
                        <input type="file" id="image" name="image3">
                        <p class="help-block">Image</p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">4th Picture</label>
                  <div class="col-sm-10">
                        <input type="file" id="image" name="image4">
                        <p class="help-block">Image</p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">5th Picture</label>
                  <div class="col-sm-10">
                        <input type="file" id="image" name="image5">
                        <p class="help-block">Image</p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">6th Picture</label>
                  <div class="col-sm-10">
                        <input type="file" id="image" name="image6">
                        <p class="help-block">Image</p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Video</label>
                  <div class="col-sm-10">
                  {!! Form::text('video', $worker->video, array('class' => 'form-control', 'placeholder'=>'Video URL' ) ) !!}
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
