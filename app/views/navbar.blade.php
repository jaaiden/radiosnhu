<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="cursor:pointer;" href="#" onclick="$('html,body').animate({scrollTop:0},'slow');return false;"><span class="fa fa-leaf"></span> RadioSNHU</a>
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
            <li><a href="#about">About</a></li>
            <li>/</li>
            <li><a href="#showlineup">Today's Lineup</a></li>
            <li>/</li>
            <li><a href="#events">Events</a></li>
            <li>/</li>
            <li><a href="#djbookings">DJ Bookings</a></li>
            <li>/</li>
            <li><a href="#alumni">Alumni</a></li>
            <li>/</li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </h4>
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>
</div>