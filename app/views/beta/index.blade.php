<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="RadioSNHU">

    <title>RadioSNHU</title>

    <link href="http://bootswatch.com/paper/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <style type="text/css">
      .jt-primary {
        background-color: #2196f3;
        margin-top: -25px;
      }
      body {
        background: url('{{ asset("img/stripe.png") }}');
        background-repeat: repeat;
      }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="padding-top:64px;" data-spy="scroll" data-target="#page-nav">

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
            <li class="navbar-text" style="color:#666666"><span id="currentshow"></span> <!-- <span id="songinfo"></span> --></li>
            <li><a id="play" onclick="playAudio()"><span class="fa fa-play"></span></a></li>
            <li><a id="pause" onclick="pauseAudio()"><span class="fa fa-pause"></span></a></li>
            <li><a id="volup" onclick="volumeUp()"><span class="fa fa-volume-off"></span> <span class="fa fa-angle-up"></span></a></li>
            <li><a id="voldn" onclick="volumeDown()"><span class="fa fa-volume-off"></span> <span class="fa fa-angle-down"></span></a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="jumbotron jt-primary" id="mainheader">
      <div class="container">
        <h3 style="color:white;">Welcome to RadioSNHU!</h3>
        <p style="color:white;">Your source for the greatest music and amazing shows created at Southern New Hampshire University</p>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">

        <div class="col-md-2" id="page-nav">
          <ul class="list-group" data-spy="affix">
            <a href="#" onclick="$('html,body').animate({scrollTop:0},'slow');return false;" class="list-group-item"><span class="fa fa-chevron-up"></span> Back to Top</a>
            <a href="#about" class="list-group-item">About</a>
            <a href="#showlineup" class="list-group-item">Today's Show Lineup</a>
            <a href="#events" class="list-group-item">Upcoming Events</a>
            <a href="#djbookings" class="list-group-item">Book a DJ</a>
            <a href="#alumni" class="list-group-item">Alumni</a>
            <a href="#contact" class="list-group-item">Contact</a>
          </ul>
        </div>

        <div class="col-md-10">
          
          <div id="about">
            <div class="panel panel-primary">
              <div class="panel-heading">About RadioSNHU</div>
              <div class="panel-body">
                <p class="lead">{{ Content::where('section', 'about')->first()->content; }}</p>
              </div>
            </div>
          </div>

          <div id="showlineup">
            <div class="panel panel-primary">
              <div class="panel-heading">Today's Show Lineup</div>
              <div class="panel-body">
                @foreach(Shows::today()->orderBy('starttime', 'asc')->get() as $show)
                  <div class="media">
                    <div class="media-body">
                      <h4 class="media-heading">{{ $show->showname }} <small><i>with {{ $show->hosts }}</i></small></h4>
                      {{ $show->description }} / {{ date('g:i a', strtotime($show->starttime)) }} - {{ date('g:i a', strtotime($show->endtime)) }}
                      </ol>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <div id="events">
            <div class="panel panel-primary">
              <div class="panel-heading">Upcoming Events</div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="col-md-6">
                    <h3>{{ Content::where('section', 'eventname')->first()->content; }}</h3>
                    <p class="lead">{{ Content::where('section', 'eventdesc')->first()->content; }}</p>
                  </div>
                  <div class="col-md-6">
                    <img src="{{ Content::where('section', 'eventimg')->first()->content; }}" class="pull-right img-thumbnail img-responsive" width="30%">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="djbookings">
            <div class="panel panel-primary">
              <div class="panel-heading">Book a DJ for your Event!</div>
              <div class="panel-body">
                <div class="row-fluid">

                  <div class="col-md-8">
                    <p class="lead">Do you have a party or other event and are looking for music? Book a DJ with RadioSNHU! You can request specific songs or just a genera of music and we can build a playlist for your event. Please be considerate and have a place for us to setup.</p>
                  </div>

                  <div class="col-md-4">
                    <a href="{{ URL::to('request') }}" target="_blank" class="btn btn-block btn-primary" style="margin-top:20px;">Request a DJ!</a>
                  </div>

                </div>
              </div>
            </div>
          </div>
          
          <div id="alumni">
            <div class="panel panel-primary">
              <div class="panel-heading">RadioSNHU Alumni</div>
              <div class="panel-body">
                <ul class="list-unstyled">
                  @foreach(Alumni::all() as $alumni)
                    <li><strong>{{ $alumni->name }}</strong> <i>({{ $alumni->description }})</i></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          
          <div id="contact">
            <div class="panel panel-primary">
              <div class="panel-heading">Contact Us</div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="col-md-6">
                    <address>
                      <strong>RadioSNHU</strong><br>
                      Student Center, Room 117<br>
                      Southern New Hampshire University<br>
                      <a href="mailto:radiosnhu@snhu.edu">radiosnhu@snhu.edu</a>
                    </address>
                    <a href="//facebook.com/pages/Radio-SNHU/123948100953382?fref=ts" target="_blank" style="text-decoration:none;">
                      <span class="fa-stack fa-lg fa-2x">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-inverse fa-stack-1x"></i>
                      </span>
                    </a>
                    <a href="//twitter.com/RadioSNHU" target="_blank" style="text-decoration:none;">
                      <span class="fa-stack fa-lg fa-2x">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-twitter fa-inverse fa-stack-1x"></i>
                      </span>
                    </a>
                    <a href="https://instagram.com/radiosnhu" target="_blank" style="text-decoration:none;">
                      <span class="fa-stack fa-lg fa-2x">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-instagram fa-inverse fa-stack-1x"></i>
                      </span>
                    </a>
                  </div>
                  <div class="col-md-6">
                    @foreach(Contact::all() as $contact)
                      <address>
                        <strong>{{ $contact->position }}</strong><br>
                        {{ $contact->name }}<br>
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                      </address>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="panel panel-primary">
      <div class="panel-body">
        <p>&copy; 2015 RadioSNHU. Created by Andy Monahan and Zack Devine.</p>
      </div>
    </div>

    <audio id="audiostream" preload="none" src="http://radio.snhu.edu:8006/;?icy=http"></audio>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      var audio;

      $(document).ready(function(){

        var header = $("#mainheader");
        header.height($(window).height());
        header.animate({ height: "218px" }, {queue: false, duration: 1500})

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
