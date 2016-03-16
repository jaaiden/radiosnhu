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
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href="{{ asset('themes/flatty/assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    @include('navbar')
    
    @if (Content::where('section', 'hasNotification')->first()->content == "yes")
      <div class="alert alert-snhu">
      	<strong>{{ Content::where('section', 'notificationTitle')->first()->content }}</strong> {{ Content::where('section', 'notificationContent')->first()->content }}
      </div>
    @endif

    <div class="container" id="about">
      <div class="row mt centered">
        <div class="col-lg-6 col-lg-offset-3">
          <h1>About RadioSNHU</h1>
        </div>
      </div>

      <div class="row mt centered">
        <div class="col-md-10 col-md-offset-1">
          <div class="row-fluid">
            <div class="col-md-8 text-left">
              {{ Content::where('section', 'about')->first()->content; }}
            </div>
            <div class="col-md-4">
              <a class="twitter-timeline" data-chrome="transparent" data-dnt="true" href="https://twitter.com/RadioSNHU" data-widget-id="579212256749174784">Tweets by RadioSNHU</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>

    <div class="container" id="showlineup">
      <div class="row mt centered">
        <div class="col-lg-6 col-lg-offset-3">
          <h1>Today's Show Lineup</h1>
        </div>
      </div>

      <div class="row mt centered">
        <div class="col-md-10 col-md-offset-1 text-center">
          @forelse(Shows::today()->orderBy('starttime', 'asc')->get() as $show)
            <div class="media">
              <div class="media-body">
                <h4 class="media-heading">{{ $show->showname }}</h4>
                {{ date('g:i a', strtotime($show->starttime)) }} - {{ date('g:i a', strtotime($show->endtime)) }}
              </div>
            </div>
          @empty
            <p class="lead">No shows today!</p>
          @endforelse
          <br><br>
          <button class="btn snhu-btn" type="button" data-toggle="modal" data-target="#showschedule">View Weekly Show Lineup</button>
          
        </div>
      </div>
      <hr>
    </div>

    <div class="container" id="events">
      <div class="row mt centered">
        <div class="col-lg-6 col-lg-offset-3">
          <h1>RadioSNHU Events</h1>
        </div>
      </div>

      <div class="row mt centered">
        <div class="col-md-10 col-md-offset-1">
          <div class="row-fluid">
            <div class="col-md-6">
              <h3>{{ Content::where('section', 'eventname')->first()->content; }}</h3>
              {{ Content::where('section', 'eventdesc')->first()->content; }}
            </div>
            <div class="col-md-6">
              <div class="center-block">
                <img src="{{ Content::where('section', 'eventimg')->first()->content; }}" class="img-thumbnail" width="90%">
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>

    <div class="container" id="djbookings">
      <div class="row mt centered">
        <h1>Book a DJ for your Event</h1>
      </div>

      <div class="row mt centered">
        <div class="col-md-10 col-md-offset-1">
          <div class="row-fluid">

            <div class="col-md-6">
              <h3><a href="mailto:radiosnhu@snhu.edu">radiosnhu@snhu.edu</a> / Office Location - Student Center R117</h3>
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
              <p class="lead">Do you have a party or other event and are looking for music? Book a DJ with RadioSNHU! You can request specific songs or just a genera of music and we can build a playlist for your event. Please be considerate and have a place for us to setup.</p>

              <a href="http://goo.gl/forms/KFNC8HNkYl" target="_blank" class="btn btn-block snhu-btn">Request a DJ!</a>
            </div>

          </div>
        </div>
      </div>
      <hr>
    </div>

    <div class="container" id="alumni">
      <div class="row mt centered">
        <h1>RadioSNHU Alumni</h1>
      </div>
      <div class="row mt centered">
        <div class="col-md-10 col-md-offset-1">
          <ul class="list-unstyled">
            @foreach(Alumni::all() as $alumni)
              <li><strong>{{ $alumni->name }}</strong> <i>({{ $alumni->description }})</i></li>
            @endforeach
          </ul>
        </div>
      </div>
      <hr>
    </div>

    <div class="container" id="contact">
      <div class="row mt centered">
        <h1>Contact Us</h1>
        <h3><a href="mailto:radiosnhu@snhu.edu">radiosnhu@snhu.edu</a></h3>
      </div>

      <div class="row mt centered">
        <div class="col-md-10 col-md-offset-1">
          @foreach(Contact::all() as $contact)
            <address>
              <strong>{{ $contact->position }}</strong><br>
              {{ $contact->name }}<br>
            </address>
          @endforeach
        </div>
      </div>
      <hr>
    </div>

    <a class="btn btn-default hidden" id="top-link-block" href="#top" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
      <i class="fa fa-chevron-up" style="color:black;"></i> Back to Top
    </a>

    <div class="container">
      <br>
      <p class="centered">&copy; 2015 RadioSNHU. Created by Zack Devine. <a href="http://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/laravel-l-slant.png" height="16"></a> / <a href="http://getbootstrap.com" target="_blank"><img src="http://getbootstrap.com/assets/brand/bootstrap-solid.svg" height="16"></a> / <a href="http://digitalocean.com" target="_blank"><img src="https://www.digitalocean.com/assets/images/logos-badges/horizontal-color-ea86b802.png" height="16"></a></p>
    </div>
    
    <div class="modal fade" id="showschedule" tabindex="-1" role="dialog" aria-labelledby="showschedulelabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="showschedulelabel">RadioSNHU Show Schedule</h4>
          </div>
          
          <div class="modal-body">
            <div class="accordion" id="scheduleaccordion"><div class="panel">
              <div class="btn-group">
                <button class="btn btn-default snhu-btn accordion-toggle active" type="button" data-toggle="collapse" data-target="#sunday" aria-expanded="true" aria-controls="sunday" data-parent="#scheduleaccordion">Sunday</button>
                <button class="btn btn-default snhu-btn accordion-toggle" type="button" data-toggle="collapse" data-target="#monday" aria-expanded="false" aria-controls="monday" data-parent="#scheduleaccordion">Monday</button>
                <button class="btn btn-default snhu-btn accordion-toggle" type="button" data-toggle="collapse" data-target="#Tuesday" aria-expanded="false" aria-controls="Tuesday" data-parent="#scheduleaccordion">Tuesday</button>
                <button class="btn btn-default snhu-btn accordion-toggle" type="button" data-toggle="collapse" data-target="#Wednesday" aria-expanded="false" aria-controls="Wednesday" data-parent="#scheduleaccordion">Wednesday</button>
                <button class="btn btn-default snhu-btn accordion-toggle" type="button" data-toggle="collapse" data-target="#Thursday" aria-expanded="false" aria-controls="Thursday" data-parent="#scheduleaccordion">Thursday</button>
                <button class="btn btn-default snhu-btn accordion-toggle" type="button" data-toggle="collapse" data-target="#Friday" aria-expanded="false" aria-controls="Friday" data-parent="#scheduleaccordion">Friday</button>
                <button class="btn btn-default snhu-btn accordion-toggle" type="button" data-toggle="collapse" data-target="#Saturday" aria-expanded="false" aria-controls="Saturday" data-parent="#scheduleaccordion">Saturday</button>
              </div>
              
              <div class="collapse in" id="sunday">
                <ul class="list-group">
            	    @forelse(Shows::where('showday', '=', 'Sunday')->get() as $show)
                    <li class="list-group-item">
                      <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                      <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
                    </li>
                  @empty
                    <li class="list-group-item">There are no shows on Sunday.</li>
                  @endforelse
                </ul>
              </div>
                
              <div class="collapse" id="monday">
                <ul class="list-group">
            	    @forelse(Shows::where('showday', '=', 'Monday')->get() as $show)
                    <li class="list-group-item">
                      <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                      <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
                    </li>
                  @empty
                    <li class="list-group-item">There are no shows on Monday.</li>
                  @endforelse
                </ul>
              </div>
              
              <div class="collapse" id="Tuesday">
                <ul class="list-group">
            	    @forelse(Shows::where('showday', '=', 'Tuesday')->get() as $show)
                    <li class="list-group-item">
                      <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                      <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
                    </li>
                  @empty
                    <li class="list-group-item">There are no shows on Tuesday.</li>
                  @endforelse
                </ul>
              </div>
              
              <div class="collapse" id="Wednesday">
                <ul class="list-group">
            	    @forelse(Shows::where('showday', '=', 'Wednesday')->get() as $show)
                    <li class="list-group-item">
                      <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                      <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
                    </li>
                  @empty
                    <li class="list-group-item">There are no shows on Wednesday.</li>
                  @endforelse
                </ul>
              </div>
              
              <div class="collapse" id="Thursday">
                <ul class="list-group">
            	    @forelse(Shows::where('showday', '=', 'Thursday')->get() as $show)
                    <li class="list-group-item">
                      <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                      <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
                    </li>
                  @empty
                    <li class="list-group-item">There are no shows on Thursday.</li>
                  @endforelse
                </ul>
              </div>
              
              <div class="collapse" id="Friday">
                <ul class="list-group">
            	    @forelse(Shows::where('showday', '=', 'Friday')->get() as $show)
                    <li class="list-group-item">
                      <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                      <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
                    </li>
                  @empty
                    <li class="list-group-item">There are no shows on Friday.</li>
                  @endforelse
                </ul>
              </div>
              
              <div class="collapse" id="Saturday">
                <ul class="list-group">
            	    @forelse(Shows::where('showday', '=', 'Saturday')->get() as $show)
                    <li class="list-group-item">
                      <h4 class="list-group-item-heading">{{ $show->showname }}</h4>
                      <p class="list-group-item-text">with {{ $show->hosts }} at {{ date('g:i a', strtotime($show->starttime)) }} to {{ date('g:i a', strtotime($show->endtime)) }}</p>
                    </li>
                  @empty
                    <li class="list-group-item">There are no shows on Saturday.</li>
                  @endforelse
                </ul>
              </div>
            </div></div>
            
          </div>
          
        </div>
      </div>
    </div>

    <audio id="audiostream" preload="none" src="http://159.203.98.213:8000/;?icy=http"></audio>
    @include('jscode')
  </body>
</html>
