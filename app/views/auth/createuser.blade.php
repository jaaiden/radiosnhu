@extends('layouts.master')
@section('content')
  <div class="container-fluid" style="margin-top:85px;">
    <div class="row-fluid">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <h3 class="page-header">Enter DJ Information</h3>
        <p class="lead">Information submitted here will be reviewed by RadioSNHU's E-Board team. Please make sure you are entering clean content before submitting the form!</p>
        {{ Form::open(array('url' => 'data/create', 'files' => true)) }}
          <input type="hidden" name="code" value="{{ $code }}">
          <div class="form-group">
            {{ Form::label('email', 'Email Address') }}
            <p name="email" id="email" class="form-control-static">{{ $email }}</p>
          </div>
          <div class="form-group">
            {{ Form::label('firstname', 'First Name') }}
            {{ Form::text('firstname', $fname, array('class' => 'form-control', 'placeholder' => 'First Name')) }}
          </div>
          <div class="form-group">
            {{ Form::label('lastname', 'Last Name') }}
            {{ Form::text('lastname', $lname, array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
          </div>
          <div class="form-group">
            {{ Form::label('showname', 'Show Name') }}
            {{ Form::text('showname', '', array('class' => 'form-control', 'placeholder' => 'Your show name')) }}
          </div>
          <div class="form-group">
            {{ Form::label('showtime', 'Show Time') }}
            {{ Form::text('showtime', '', array('class' => 'form-control', 'placeholder' => 'When your show is live. For example: Fridays @ 5PM')) }}
          </div>
          <div class="form-group">
            {{ Form::label('aboutshow', 'Show Information') }}
            {{ Form::text('aboutshow', '', array('class' => 'form-control', 'placeholder' => 'A short description of your show')) }}
          </div>
          <div class="form-group">
            {{ Form::label('aboutdj', 'DJ Information') }}
            {{ Form::text('aboutdj', '', array('class' => 'form-control', 'placeholder' => 'A short description about yourself')) }}
          </div>
          <div class="form-group">
            {{ Form::label('profileimg', 'Profile Image') }}
            {{ Form::file('profileimg', array('class' => 'form-control')) }}
            <span class="help-block">Any square image. Recommended size of 128x128 pixels.</span>
          </div>
          <p class="lead">Extra Information</p>
          <div class="form-group">
            {{ Form::label('twitter', 'Twitter Username') }}
            {{ Form::text('twitter', '', array('class' => 'form-control', 'placeholder' => 'Your Twitter username (If you have one, leave this field blank if you do not). Do not include @.')) }}
          </div>
          {{ Form::submit('Submit Information', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>
@stop