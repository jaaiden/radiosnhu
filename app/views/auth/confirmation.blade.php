@extends('layouts.master')
@section('content')
  <div class="container-fluid" style="margin-top:85px;">
    <div class="row-fluid">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <h3 class="page-header">Registration Successful!</h3>
        <p class="lead">Thank you for registering for RadioSNHU! We will let you know if there is anything you need to change or if you are all set.</p>
        <p class="lead">Click <a href="{{ URL::to('') }}">here</a> to go back.</p>
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>
@stop