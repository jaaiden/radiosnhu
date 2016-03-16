@extends('layouts.master')
@section('content')

<div class="jumbotron">
  <div class="container">
    <h3>Create DJ Code</h3>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      {{ Form::open(array('url' => 'admin/createuser')) }}
        <?php $code = Str::random(10); ?>
        <input type="hidden" name="code" value="{{ $code }}">
        <div class="form-group">
          {{ Form::label('email', 'DJ Email Address') }}
          {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address')) }}
        </div>
        <div class="form-group">
          {{ Form::label('code', 'Unique Code') }}
          <p class="form-control-static">{{ $code }}</p>
        </div>
        {{ Form::submit('Send Email', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>

@stop