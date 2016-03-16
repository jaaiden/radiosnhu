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

    @include('archivenavbar')

    <div class="container" id="archive">
      
      <div class="row mt centered">
        <div class="col-lg-6 col-lg-offset-3">
          <h1>RadioSNHU Show Archive</h1>
        </div>
      </div>

      <div class="row mt centered">
        
        <div class="col-md-10 col-md-offset-1">
          
          <div class="list-group text-left">
          
            @foreach (Shows::all() as $show)
            	<a href="{{ url('archive/profile/' . $show->showname) }}" class="list-group-item">
            	  <h3 class="list-group-item-heading">{{ $show->showname }}</h3>
            	  <p class="list-group-item-text">with {{ $show->hosts != "" ? $show->hosts : 'Unknown Host' }}<span class="pull-right"><?php $arccount = count(Archive::where('showid', $show->id)->get()); ?>{{ $arccount }} {{ $arccount == 1 ? 'archived show' : 'archived shows' }}.</span></p>
            	</a>
          	@endforeach
          </div>
          
        </div>
      
      </div>
      
      <hr>
      
    </div>

    <div class="container">
      <br>
      <p class="centered">&copy; 2015 RadioSNHU. Created by Zack Devine. <a href="http://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/laravel-l-slant.png" height="16"></a> / <a href="http://getbootstrap.com" target="_blank"><img src="http://getbootstrap.com/assets/brand/bootstrap-solid.svg" height="16"></a> / <a href="http://digitalocean.com" target="_blank"><img src="https://www.digitalocean.com/assets/images/logos-badges/horizontal-color-ea86b802.png" height="16"></a></p>
    </div>
    
    <audio id="audiostream" preload="none" src="http://159.203.98.213:8000/;?icy=http"></audio>
    @include('jscode')
    
  </body>
</html>
