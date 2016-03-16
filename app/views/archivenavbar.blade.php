<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="cursor:pointer;" href="{{ url('') }}"><span class="fa fa-leaf"></span> RadioSNHU</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="navbar-text"><span id="currentshow"></span>{{-- <span id="songinfo"></span> --}}</li>
        <li><a id="play" onclick="playAudio()"><span class="fa fa-play"></span></a></li>
        <li><a id="pause" onclick="pauseAudio()"><span class="fa fa-pause"></span></a></li>
        <li><a id="volup" onclick="volumeUp()"><span class="fa fa-volume-off"></span> <span class="fa fa-angle-up"></span></a></li>
        <li><a id="voldn" onclick="volumeDown()"><span class="fa fa-volume-off"></span> <span class="fa fa-angle-down"></span></a></li>
      </ul>
    </div>
  </div>
</div>

<div id="headerwrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <h4>
          <ul class="list-inline">
            <li><a href="{{ url('') }}">Home</a></li>
            <li>/</li>
            <li><a href="{{ url('archive') }}">Archive</a></li>
            <li>/</li>
            <li><a href="{{ url('archive/upload') }}">Upload</a></li>
          </ul>
        </h4>
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>
</div>