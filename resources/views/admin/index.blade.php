@extends('layouts.baseadmin')
@inject('routeGenerator', 'App\Services\RouteGeneratorService')

@section('page')
    Index
@endsection

@section('title')
Main Menu
    <small></small>
@endsection

@section('level')
    <li><a href="{{ url()->previous() }}"><i class="fa fa-reply"></i>Go Back</a></li>
    <li class="active">Index</li>
@endsection

@section('content')




@endsection
