<nav class="navbar navbar-inverse navbar-static-top" style="margin-top:65px;" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#playerbox">
        <span class="sr-only">Show/Hide</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="{{ URL::to('') }}"></a> -->
    </div>

    <div class="collapse navbar-collapse" id="playerbox">
      <ul class="nav navbar-nav">
        <li><a href="#" id="play"><i class="fa fa-play fa-2x"></i></a></li>
        <li><a href="#" id="pause"><i class="fa fa-pause fa-2x"></i></a></li>
        <li><a href="#" id="voldown"><i class="fa fa-angle-down fa-2x"></i></a></li>
        <li><a href="#" id="mute"><i class="fa fa-volume-up fa-2x"></i></a></li>
        <li><a href="#" id="volup"><i class="fa fa-angle-up fa-2x"></i></a></li>
        <li><a class="navbar-brand" style="color:white; margin-top:2px;">You are listening to <strong>RadioSNHU</strong>, Enjoy!</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      
      </ul>
    </div>
  </div>
</nav>
<audio id="audiostream" preload="none" src="http://radio.snhu.edu:8006/;?icy=http"></audio>
<script type="text/javascript">
  var audio;

  $(document).ready(function(){
      audio = $("#audiostream");
      addEventHandlers();
      $("#pause").hide();
  });

  function addEventHandlers(){
      $("#play").click(playAudio);
      $("#pause").click(pauseAudio);
      $("#voldown").click(volumeDown);
      $("#mute").click(toggleMuteAudio);
      $("#volup").click(volumeUp);
  }

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

  function stopAudio(){
      pauseAudio();
      audio.prop("currentTime",0);
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

  function toggleMuteAudio(){
      audio.prop("muted",!audio.prop("muted"));
  }
</script>