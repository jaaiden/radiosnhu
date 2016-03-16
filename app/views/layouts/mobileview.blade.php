<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>RadioSNHU Mobile!</title>

    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link href="{{ asset('mobile/css/ratchet.min.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('mobile/js/ratchet.min.js') }}"></script>
    <script src="http://sdepold.github.io/jquery-rss/src/jquery.rss.js"></script>
  </head>
  <body>

    <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav">
      <h1 class="title" id="playerstatus">Getting Media Information...</h1>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content">

      <!-- <div class="content-padded">
        <h4>Latest News</h4>
      </div>

      <div id="rss-styled"></div>

      <script type="text/javascript">
        $("#rss-styled").rss("http://www.snhu.edu/rss_news.xml", {
            limit: 5,
            layoutTemplate: '<ul class="table-view">{entries}</ul>',
            entryTemplate: '<li class="table-view-cell media"><a class="navigate-right" href="http://www.snhu.edu{url}" data-ignore="push" target="_blank"><div class="media-body">{title} <p>{shortBodyPlain}</p></div></a></li>'
        }).show();
      </script> -->

    </div>

    <nav class="bar bar-tab">
      <a class="tab-item" href="#" id="play">
        <span class="icon icon-play"></span>
        <!-- <span class="tab-label">Play</span> -->
      </a>
      <a class="tab-item" href="#" id="pause">
        <span class="icon icon-pause"></span>
        <!-- <span class="tab-label">Pause</span> -->
      </a>
    </nav>

    <audio id="audiostream" preload="none" src="http://159.203.98.213:8000/;?icy=http"></audio>

    <script type="text/javascript">
      var audio;

      $(document).ready(function(){
          audio = $("#audiostream");
          addEventHandlers();
          $("#pause").hide();
          setInterval(function() {
            $.post('getsonginfo',
            function(output) {
              $("#playerstatus").text(output);
            });
          }, 10000, true);
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

  </body>
</html>
