<style type="text/css">
  #nav.affix {
    position: fixed;
    top: 0;
    width: 100%
  }

  .audioControl {
    cursor: pointer;
  }
</style>

{{-- <div class="jumbotron" style="margin-bottom:-20px;">
  <div class="container">
    <div class="row">
      <span class="pull-right" style="margin-top:-10px;">
        <span class="text-right"><h5>Featured Show</h5></span>
        <h2 style="margin-top:-5px;">Infinite Playlist</h2>
      </span>
      <h1 style="margin-top:-10px;"><span class="fa fa-play-circle-o"></span> RadioSNHU</h1>
    </div>
  </div>
</div> --}}

<div style="margin-bottom:50px;">
  <nav id="nav" class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="navbar-brand">RadioSNHU</div>
      </div>
      <!-- <ul class="nav navbar-nav">
        <li id="play" class="audioControl"><a onclick="playAudio()"><span class="fa fa-play"></span></a></li>
        <li id="pause" class="audioControl"><a onclick="pauseAudio()"><span class="fa fa-pause"></span></a></li>

        <li id="volUp" class="audioControl"><a onclick="volumeUp()"><span class="fa fa-angle-up"></span></a></li>
        <li id="volDn" class="audioControl"><a onclick="volumeDown()"><span class="fa fa-angle-down"></span></a></li>

        <li class="audioControl"><a data-toggle="modal" data-target="#optionsModal"><span class="fa fa-gear"></span></a></li>
      </ul> -->
      <ul class="nav navbar-nav">
        <li><a onclick="showAbout()" style="cursor:pointer;">About</a></li>
        <li><a onclick="showLineup()" style="cursor:pointer;">Show Lineup</a></li>
        <li><a onclick="showDJBookings()" style="cursor:pointer;">DJ Bookings</a></li>
        <li><a onclick="showNTT()" style="cursor:pointer;">Name That Tune</a></li>
        <li><a onclick="showFallConcert()" style="cursor:pointer;">Rock the Night Away</a></li>
        <li><a onclick="showAlumni()" style="cursor:pointer;">Alumni</a></li>
        <li><a onclick="showCredits()" style="cursor:pointer;">Credits</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li class="navbar-text"><i class="text-muted"><span class="fa fa-angle-left"></span> Drag This Bar</i></li> -->
      </ul>
    </div>
  </nav>
</div>

<div class="jumbotron" style="margin-top:-45px;padding-bottom:-20px;">
  <h5 style="margin-left:22px;margin-top:-25px;">Now Playing:</h5>
  <h2 style="margin-left:20px;margin-top:-10px;margin-bottom:-40px;">RadioSNHU Infinite Playlist</h2>
  <span class="pull-right" style="margin-right:20px;">
    <a onclick="playAudio()">Play Stream</a>
    <a onclick="pauseAudio()">Pause Stream</a>
  </span>
</div>

<!-- <div class="jumbotron" style="margin-bottom:30px;">
  <div class="container">
    <span class="pull-right" style="margin-top:-10px;">
      <div class="btn-toolbar">
        <h2>
          <a onclick="playAudio()" id="play" class="text-muted"><span class="fa fa-play"></span></a>
          <a onclick="pauseAudio()" id="pause" class="text-muted"><span class="fa fa-pause"></span></a>
        </h2>
      </div>
    </span>
    You're listening to...
    <h2 style="margin-top:-5px;" id="playerstatus">Loading...</h2>
  </div>
</div> -->

<script>
$('#nav').affix({
  offset: {
    top: 189
  }
});

function showAbout()
{
  $('#content').attr('src', '{{ URL::to("about") }}');
}

function showLineup()
{
  $('#content').attr('src', '{{ URL::to("showlineup") }}');
}

function showDJBookings()
{
  $('#content').attr('src', '{{ URL::to("djbookings") }}');
}

function showNTT()
{
  $('#content').attr('src', '{{ URL::to("namethattune") }}');
}

function showFallConcert()
{
  $('#content').attr('src', '{{ URL::to("fallconcert") }}');
}

function showAlumni()
{
  $('#content').attr('src', '{{ URL::to("alumni") }}');
}

function showCredits()
{
  $('#content').attr('src', '{{ URL::to("credits") }}');
}

function showDJProfile(djname)
{
  $('#content').attr('src', '{{ URL::to("profiles/' + djname + '") }}');
}
</script>

<div class="modal fade" id="optionsModal" tabindex="-1" role="dialog" aria-labelledby="optionsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><span class="fa fa-times"></span></span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="optionsModalLabel">Stream Options</h4>
      </div>
      <div class="modal-body">
        <h4>Listen on your Computer!</h4>
        <p class="lead"><a href="http://radio.snhu.edu:8006/listen.pls?sid=1">Download Stream File</a></p>
        <p>Opens with <a href="//www.apple.com/itunes/download/" target="_blank">iTunes</a>, Windows Media Player, and <a href="//www.videolan.org/vlc/" target="_blank">VLC Media Player</a>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<audio id="audiostream" preload="none" src="http://radio.snhu.edu:8006/;?icy=http"></audio>
<script type="text/javascript">
  var audio;

  $(document).ready(function(){
    audio = $("#audiostream");
    $("#pause").hide();

    // updateSongInfo();

    // setInterval(function() {
    //   updateSongInfo();
    // }, 5000);

    shortcut.add('space', toggleMute);
    shortcut.add('up', volumeUp);
    shortcut.add('down', volumeDown);
  });

  // function updateSongInfo()
  // {
  //   $.post('getsonginfo',
  //   function(output) {
  //     $("#playerstatus").text(output);
  //   });
  // }

  function playAudio(){
    audio.trigger('play');
    $("#play").hide();
    $("#pause").show();
  }

  function pauseAudio(){
    audio.trigger('pause');
    $("#pause").hide();
    $("#play").show();
  }

  function toggleAudioState(){
    if(audio.paused == false){
      pauseAudio();
    }else
    {
      playAudio();
    }
  }

  function volumeUp(){
    var volume = audio.prop("volume")+0.2;
    if(volume >1){
        volume = 1;
    }
    audio.prop("volume",volume);
  }

  function volumeDown(){
    var volume = audio.prop("volume")-0.2;
    if(volume <0){
        volume = 0;
    }
    audio.prop("volume",volume);
  }

  function toggleMute(){
    audio.prop("muted",!audio.prop("muted"));
  }
</script>
