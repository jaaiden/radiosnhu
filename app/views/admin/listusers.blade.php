@extends('layouts.master')
@section('content')

<div class="jumbotron">
  <div class="container">
    <h3>RadioSNHU Member List <a href="{{ URL::to('') }}" class="pull-right">Go Back</a></h3>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      @foreach($users as $dj)
        <div class="media" style="margin-top:200px;">
          <img class="media-object pull-left img-circle" width="64" height="64" src="{{ $dj->profileimg }}" alt="...">
          <div class="media-body">
            <h4 class="media-heading">{{ $dj->name }} ({{ $dj->id }})</h4>
            Show: {{ $dj->showname }}<br>Twitter: <span>@</span>{{ $dj->twitter }}
          </div>
        </div>
      @endforeach
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>

@stop