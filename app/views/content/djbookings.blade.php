@extends('layouts.frameview')

@section('framecontent')

<h3 class="page-header">Book a DJ for your Event <small>RadioSNHU DJ Service</small></h3>

<p class="lead"><a href="mailto:radiosnhu@snhu.edu">radiosnhu@snhu.edu</a> | Office Location - Student Center R117 <span class="pull-right">Request a DJ</span></p>

<div class="row-fluid">
  <div class="col-lg-6">
    <p class="lead">Do you have a party or other event and are looking for music? Book a DJ with RadioSNHU! You can request specific songs or just a genera of music and we can build a playlist for your event. Please be considerate and have a place for us to setup.</p>
    <div class="text-center">
	  <a href="//facebook.com/pages/Radio-SNHU/123948100953382?fref=ts" target="_blank" style="text-decoration:none;">
	  	<span class="fa-stack fa-lg fa-3x">
	  	  <i class="fa fa-circle fa-stack-2x"></i>
	  	  <i class="fa fa-facebook fa-inverse fa-stack-1x"></i>
	  	</span>
	  </a>
	  <a href="//twitter.com/RadioSNHU" target="_blank" style="text-decoration:none;">
	  	<span class="fa-stack fa-lg fa-3x">
	  	  <i class="fa fa-circle fa-stack-2x"></i>
	  	  <i class="fa fa-twitter fa-inverse fa-stack-1x"></i>
	  	</span>
	  </a>
	</div>
  </div>

  <div class="col-lg-6">
	{{ Form::open(array('url' => 'sendemail')) }}
	  <div class="form-group">
	    {{ Form::text('name', '', array('placeholder' => 'Name', 'class' => 'form-control')) }}
	  </div>
	  <div class="form-group">
	    {{ Form::text('email', '', array('placeholder' => 'Email', 'class' => 'form-control')) }}
	  </div>
	  <div class="form-group">
	    {{ Form::text('subject', '', array('placeholder' => 'Subject', 'class' => 'form-control')) }}
	  </div>
	  <div class="form-group">
	    <textarea name="message" id="message" placeholder="Message" class="form-control" rows="5"></textarea>
	  </div>
	  <div class="form-group">
	    {{ Form::submit('Request a DJ', array('class' => 'btn btn-primary btn-block')) }}
	  </div>
	{{ Form::close() }}

  </div>
</div>

@stop
