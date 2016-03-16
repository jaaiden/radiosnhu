@extends('layouts.master')
@section('content')

<div class="jumbotron">
  <div class="container">
    <h3>Edit DJ Information</h3>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      {{ Form::open(array('url' => 'admin/updateuser')) }}
        <input type="hidden" name="djid" value="{{ $dj->id }}">
        <div class="form-group">
          {{ Form::label('name', 'DJ Name') }}
          {{ Form::text('name', $dj->name, array('class' => 'form-control', 'placeholder' => 'DJ Name')) }}
        </div>
        <div class="form-group">
          {{ Form::label('showname', 'Show Name') }}
          {{ Form::text('showname', $dj->showname, array('class' => 'form-control', 'placeholder' => 'Show Name')) }}
        </div>
        <div class="form-group">
          {{ Form::label('showtime', 'Show Time') }}
          {{ Form::text('showtime', $dj->showtime, array('class' => 'form-control', 'placeholder' => 'Show Time')) }}
        </div>
        <div class="form-group">
          {{ Form::label('aboutdj', 'About DJ') }}
          {{ Form::text('aboutdj', $dj->aboutdj, array('class' => 'form-control', 'placeholder' => 'About DJ')) }}
        </div>
        <div class="form-group">
          {{ Form::label('aboutshow', 'About Show') }}
          {{ Form::text('aboutshow', $dj->aboutshow, array('class' => 'form-control', 'placeholder' => 'About Show')) }}
        </div>
        <div class="form-group">
          {{ Form::label('twitter', 'Twitter Username') }}
          {{ Form::text('twitter', $dj->twitter, array('class' => 'form-control', 'placeholder' => 'Twitter Username (Do not include @)')) }}
        </div>
        {{ Form::submit('Update Information', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>

@stop