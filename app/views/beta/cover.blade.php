<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="RadioSNHU">

    <title>RadioSNHU</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <style type="text/css">
      html,body {
        height:100%;
      }

      h1 {
        font-family: Arial,sans-serif
        font-size:80px;
        color:#DDCCEE;
      }

      .lead {
        color:#DDCCEE;
      }


      /* Custom container */
      .container-full {
        margin: 0 auto;
        width: 100%;
        min-height:100%;
        background-color:#110022;
        color:#eee;
        overflow:hidden;
      }

      .container-full a {
        color:#efefef;
        text-decoration:none;
      }

      .v-center {
        margin-top:7%;
      }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container-full">

      <div class="row">
       
        <div class="col-lg-12 text-center v-center">
          
          <h1>Welcome to RadioSNHU</h1>
          <p class="lead">Your source for the greatest music and amazing shows created at Southern New Hampshire University</p>
          
          <br><br><br>
          
          <form class="col-lg-12">
            <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">
            <input class="form-control input-lg" title="Don't worry. We hate spam, and will not share your email with anyone." placeholder="Enter your email address" type="text">
              <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="button">OK</button></span>
            </div>
          </form>
        </div>
        
      </div> <!-- /row -->
  
      <div class="row">
       
        <div class="col-lg-12 text-center v-center" style="font-size:39pt;">
          <a href="http://facebook.com/pages/Radio-SNHU/123948100953382?fref=ts"><i class="fa fa-facebook"></i></a>  <a href="http://twitter.com/RadioSNHU"><i class="fa fa-twitter"></i></a> <a href="https://instagram.com/radiosnhu"><i class="fa fa-instagram"></i></a>
        </div>
      
      </div>
  
    <br><br><br><br><br>

</div> <!-- /container full -->

<div class="container">
  
    <hr>
  
    <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Hello.</h3></div>
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Hello.</h3></div>
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Hello.</h3></div>
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.
            </div>
          </div>
        </div>
    </div>
  
  <div class="row">
        <div class="col-lg-12">
        <br><br>
          <p class="pull-right"><a href="http://www.bootply.com">Template from Bootply</a> &nbsp; ©Copyright 2013 ACME<sup>TM</sup> Brand.</p>
        <br><br>
        </div>
    </div>
</div>

    <audio id="audiostream" preload="none" src="http://radio.snhu.edu:8006/;?icy=http"></audio>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
