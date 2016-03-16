@extends('layouts.admin')
@section('content')
  
  <div class="row-fluid">
  
    <div class="col-md-6">
    
      <div class="panel panel-default">
        <div class="panel-heading"><div class="panel-title">Website Statistics and Overview</div></div>
        <div class="panel-body">
          <p class="lead">Unique listeners connected: <span class="pull-right"><span id="listenercount"></span> out of 1000</span></p>
          <hr>
          <p class="lead">Number of Registered Shows: <span class="pull-right">{{ count(Shows::all()) }}</span></p>
        </div>
      </div>
    
      <div class="panel panel-default">
      	<div class="panel-heading">Today's Schedule <span class="pull-right">{{ date('l, F j, Y') }}</span></div>
      	<ul class="list-group">
      	  @forelse(Shows::today()->get() as $show)
      	    <?php $dt = Carbon::now(); ?>
      	    <li class="list-group-item {{ (($show->starttime <= ($dt->hour . ':' . $dt->minute . ':' . $dt->second)) && ($show->endtime >= ($dt->hour . ':' . $dt->minute . ':' . $dt->second))) ? 'active' : '' }}">
              <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
              <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
            </li>
      	  @empty
      	    <li class="list-group-item">There are no shows today.</li>
      	  @endforelse
      	</ul>
      </div>
      
      <div class="panel panel-default">
      	<div class="panel-heading">Server Information</div>
      	<?php $lv = app(); ?>
      	<ul class="list-group">
      	  <li class="list-group-item">User Logged In <span class="pull-right">{{ Auth::user()->firstname . " " . Auth::user()->lastname . " (" . Auth::user()->username . ")" }}</span></li>
          <li class="list-group-item">Web Server Version <span class="pull-right">{{ $_SERVER['SERVER_SOFTWARE'] }}</span></li>
          <li class="list-group-item">PHP Version <span class="pull-right">PHP/{{ phpversion() }}</span></li>
          <li class="list-group-item">Laravel Version <span class="pull-right" data-toggle="tooltip" data-placement="top" title="You can update this by running 'composer update' while SSH'd into the server.">Laravel/{{ $lv::VERSION }}</span></li>
          <li class="list-group-item">Server IP <span class="pull-right">{{ $_SERVER['SERVER_ADDR'] }}</span></li>
          <li class="list-group-item">Server Address <span class="pull-right">{{ $_SERVER['HTTP_HOST'] }}</span></li>
          <li class="list-group-item">Document Root <span class="pull-right">{{ $_SERVER['DOCUMENT_ROOT'] }}</span></li>
          <li class="list-group-item">Remote User IP <span class="pull-right">{{ $_SERVER['REMOTE_ADDR'] }}</span></li>
      	</ul>
      </div>
      
    </div>
    
    <div class="col-md-6">
  
      <div class="panel panel-default">
      	<div class="panel-heading">Weekly Schedule</div>
      	<div class="panel-body">
      	
      	  <?php $dt = Carbon::now(); ?>
      	
      	  <p class="lead">Sunday</p>
      	  <ul class="list-group">
      	    @forelse(Shows::where('showday', '=', 'Sunday')->get() as $show)
              <li class="list-group-item {{ (($show->showday == $dt->format('l')) && ($show->starttime <= ($dt->hour . ':' . $dt->minute . ':' . $dt->second)) && ($show->endtime >= ($dt->hour . ':' . $dt->minute . ':' . $dt->second))) ? 'active' : '' }}">
                <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
              </li>
            @empty
              <li class="list-group-item">There are no shows on Sunday.</li>
            @endforelse
          </ul>
          
          <p class="lead">Monday</p>
      	  <ul class="list-group">
      	    @forelse(Shows::where('showday', '=', 'Monday')->get() as $show)
              <li class="list-group-item {{ (($show->showday == $dt->format('l')) && ($show->starttime <= ($dt->hour . ':' . $dt->minute . ':' . $dt->second)) && ($show->endtime >= ($dt->hour . ':' . $dt->minute . ':' . $dt->second))) ? 'active' : '' }}">
                <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
              </li>
            @empty
              <li class="list-group-item">There are no shows on Monday.</li>
            @endforelse
          </ul>
          
          <p class="lead">Tuesday</p>
      	  <ul class="list-group">
      	    @forelse(Shows::where('showday', '=', 'Tuesday')->get() as $show)
              <li class="list-group-item {{ (($show->showday == $dt->format('l')) && ($show->starttime <= ($dt->hour . ':' . $dt->minute . ':' . $dt->second)) && ($show->endtime >= ($dt->hour . ':' . $dt->minute . ':' . $dt->second))) ? 'active' : '' }}">
                <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
              </li>
            @empty
              <li class="list-group-item">There are no shows on Tuesday.</li>
            @endforelse
          </ul>
          
          <p class="lead">Wednesday</p>
      	  <ul class="list-group">
      	    @forelse(Shows::where('showday', '=', 'Wednesday')->get() as $show)
              <li class="list-group-item {{ (($show->showday == $dt->format('l')) && ($show->starttime <= ($dt->hour . ':' . $dt->minute . ':' . $dt->second)) && ($show->endtime >= ($dt->hour . ':' . $dt->minute . ':' . $dt->second))) ? 'active' : '' }}">
                <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
              </li>
            @empty
              <li class="list-group-item">There are no shows on Wednesday.</li>
            @endforelse
          </ul>
          
          <p class="lead">Thursday</p>
      	  <ul class="list-group">
      	    @forelse(Shows::where('showday', '=', 'Thursday')->get() as $show)
              <li class="list-group-item {{ (($show->showday == $dt->format('l')) && ($show->starttime <= ($dt->hour . ':' . $dt->minute . ':' . $dt->second)) && ($show->endtime >= ($dt->hour . ':' . $dt->minute . ':' . $dt->second))) ? 'active' : '' }}">
                <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
              </li>
            @empty
              <li class="list-group-item">There are no shows on Thursday.</li>
            @endforelse
          </ul>
          
          <p class="lead">Friday</p>
      	  <ul class="list-group">
      	    @forelse(Shows::where('showday', '=', 'Friday')->get() as $show)
              <li class="list-group-item {{ (($show->showday == $dt->format('l')) && ($show->starttime <= ($dt->hour . ':' . $dt->minute . ':' . $dt->second)) && ($show->endtime >= ($dt->hour . ':' . $dt->minute . ':' . $dt->second))) ? 'active' : '' }}">
                <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
              </li>
            @empty
              <li class="list-group-item">There are no shows on Friday.</li>
            @endforelse
          </ul>
          
          <p class="lead">Saturday</p>
      	  <ul class="list-group">
      	    @forelse(Shows::where('showday', '=', 'Saturday')->get() as $show)
              <li class="list-group-item {{ (($show->showday == $dt->format('l')) && ($show->starttime <= ($dt->hour . ':' . $dt->minute . ':' . $dt->second)) && ($show->endtime >= ($dt->hour . ':' . $dt->minute . ':' . $dt->second))) ? 'active' : '' }}">
                <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
              </li>
            @empty
              <li class="list-group-item">There are no shows on Saturday.</li>
            @endforelse
          </ul>
          
      	</div>
      </div>
      
    </div>
    
  </div>
  
  
  
  
  
  
  
  
  
  
  <script type="text/javascript">
    $(document).ready(function()
    {
      $(".dial").knob();

      updateShowInfo();
      updateListenerCount();

      setInterval(function() {
        updateShowInfo();
      }, 10000);

      setInterval(function() {
        updateListenerCount();
      }, 10000);
    });

    function updateShowInfo()
    {
      $.post('getshowinfo',
      function(output) {
        $("#currentshow").text(output);
      });
    }

    function updateListenerCount()
    {
      $.post('getlistenercount',
      function(output) {
        $("#listenercount").html(output);
      });
    }
  </script>

@stop





<!-- 
  
  
<div class="row text-center">
  
        <div class="col-md-6">
          <input type="text" value="0" class="dial" id="listenerCount" data-angleOffset=-125 data-angleArc=250 data-readOnly=true data-thickness=".1" data-max="1000">
          <p class="lead">Active Listeners</p>
        </div>
  
        <div class="col-md-6">
          <h4>Current Show</h4>
          <p class="lead" id="currentshow"></p>
          <hr>
          <h4>Show Lineup</h4>
          <dl>
            @foreach(Shows::today()->get() as $show)
              <dt>{{ $show->showname }}</dt>
              <dd>{{ date('g:i a', strtotime($show->starttime)) }} - {{ date('g:i a', strtotime($show->endtime)) }} | {{ $show->showdesc }}</dd>
            @endforeach
          </dl>
        </div>
  
      </div>  
  
 
 
 
  
 -->