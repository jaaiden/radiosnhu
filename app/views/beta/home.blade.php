<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Zack Devine">

    <title>RadioSNHU Beta</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('themes/flatty/assets/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('themes/flatty/assets/css/main.css') }}" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('') }}"><b>RadioSNHU</b></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li></li>
          </ul>
        </div>
      </div>
    </div>

    <div id="headerwrap" style="padding-bottom:20px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h1>We're remaking the site better than ever.</h1>
            <h2>Please check back later to see the new redesign.</h2>
            <br>
            <h4 style="color:white;">You may also use these buttons to control the radio stream</h4>
            <div class="btn-toolbar" style="margin-top:-5px;">
              <a id="play" onclick="playAudio()" class="btn btn-success"><span class="fa fa-play"></span></a>
              <a id="pause" onclick="pauseAudio()" class="btn btn-success"><span class="fa fa-pause"></span></a>
              <a id="volup" onclick="volumeUp()" class="btn btn-info"><span class="fa fa-chevron-up"></span></a>
              <a id="voldn" onclick="volumeDown()" class="btn btn-info"><span class="fa fa-chevron-down"></span></a>
            </div>
          </div>
          <div class="col-lg-2">
          </div>
          
        </div>
      </div>
    </div>
    
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

        // updateSongInfo();

        // setInterval(function() {
        //   updateSongInfo();
        // }, 5000);
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
        $("#pause").hide();
        $("#play").show();
        audio.prop("muted",!audio.prop("muted"));
      }
    </script>
  </body>
</html>