@extends('layouts.frameview-nocontainer')

@section('framecontent')

<div class="jumbotron">
  <div class="container">
    <!-- <div class="media">
	  <a class="pull-left" onclick="showDJProfile('Logan McCarthy')" style="cursor:pointer;">
	  	<img class="media-object img-circle" src="{{ $djinfo->profileimg }}" width="128" height="128" alt="DJ Profile">
	  </a>
	  <div class="media-body" style="margin-top:30px;">
	    <h3 class="media-heading">{{ $djinfo->name }}</h3>
	    <p>{{ $djinfo->showname }} / {{ $djinfo->showtime }}</p>
	  </div> -->
    <h2>{{ $djinfo->showname }}
      <small><h5 style="margin-left:60px;">with {{ $djinfo->name }}</h5></small>
    </h2>
	</div>
  </div>
</div>

<p class="lead">{{ $djinfo->aboutme }}</p>

@stop