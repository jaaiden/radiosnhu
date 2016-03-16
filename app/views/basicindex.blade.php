<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="RadioSNHU">

    <title>RadioSNHU</title>

    <link href="{{ asset('themes/flatty/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('themes/flatty/assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="cursor:pointer;" href="#" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">RadioSNHU</a>
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
    
    <div class="alert alert-info">
      <strong>Something New is Coming...</strong> Check back here in the future to see a more modernized RadioSNHU.
    </div>

    <div class="container">
      <h4>Hi there!</h4>
      <p class="lead">The database seems to be down right now, so you can't see any information. We'll try to fix this as soon as we can!</p>
    </div>

    <ul class="pagination pagination-lg hidden" id="top-link-block">
      <li><a href="#top" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
        <i class="fa fa-chevron-up"></i>
      </a></li>
    </ul>

    <div class="container">
      <br>
      <p class="centered">&copy; 2015 RadioSNHU. Created by Andy Monahan and Zack Devine.</p>
    </div>

    <audio id="audiostream" preload="none" src="http://radio.snhu.edu:8006/;?icy=http"></audio>
    <script type="text/javascript">
      var audio;

      $(document).ready(function(){
        audio = $("#audiostream");
        $("#pause").hide();

        updateShowInfo();

        setInterval(function() {
          updateShowInfo();
        }, 5000);

        updateSongInfo();

        setInterval(function() {
          updateSongInfo();
        }, 5000);

        if ( ($(window).height() + 100) < $(document).height() ) {
          $('#top-link-block').removeClass("hidden").affix({
            // how far to scroll down before link "slides" into view
            offset: {top:100}
          });
        }
      });

      function updateShowInfo()
      {
        $.post('getshowinfo',
        function(output) {
          $("#currentshow").text(output);
        });
      }

      function updateSongInfo()
      {
        $.post('getsonginfo',
        function(output) {
          $("#songinfo").text(output);
        });
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

      function volumeUp(){
        var volume = audio.prop("volume")+0.1;
        if(volume >1){
            volume = 1;
        }
        audio.prop("volume",volume);
      }

      function volumeDown(){
        var volume = audio.prop("volume")-0.1;
        if(volume <0){
            volume = 0;
        }
        audio.prop("volume",volume);
      }

      function toggleMute(){
        $("#pause").hide();
        $("#play").show();
        audio.prop("muted",!audio.prop("muted"));
      }

      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
    </script>
  </body>
</html>
