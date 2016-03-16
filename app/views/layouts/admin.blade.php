<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RadioSNHU Admin Control Panel</title>

    <!-- Bootstrap -->
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/paper/bootstrap.min.css" rel="stylesheet"> -->
    {{-- <link rel="stylesheet" type="text/css" href="//bootswatch.com/lumen/bootstrap.min.css"> --}}
    {{-- <link href="{{ asset('themes/flatty/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/flatty/assets/css/main.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('login/app.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <link href="{{ asset('css/datetimepicker.css') }}" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/popover.js') }}"></script>
    <script src="{{ asset('js/transition.js') }}"></script>
    <script src="{{ asset('js/collapse.js') }}"></script>
    <script src="//sdepold.github.io/jquery-rss/src/jquery.rss.js"></script>
    <script src="{{ asset('js/knob.min.js') }}"></script>
    <script src="{{ asset('js/Chart.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @if(Auth::check())
      <!-- <div class="jumbotron">
        <div class="container">
          <h3>RadioSNHU Control Panel <small><span class="pull-right">{{ Auth::user()->username }} / <a href="{{ URL::to('admin/logout') }}">Logout</a></span></small></h3>
        </div>
      </div> -->

      <div class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">RadioSNHU Control Panel</span>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="{{ URL::to('') }}" target="_blank"><i class="fa fa-angle-left"></i> RadioSNHU Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="navbar-text">Logged in as {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} ({{ Auth::user()->username }})</li>
              <li><a href="{{ URL::to('admin/logout') }}">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="container-fluid" style="margin-top:30px;">
        <div class="row-fluid">
          <div class="col-md-2">
            <div class="list-group">
              <a class="list-group-item {{ Request::path() == 'admin' ? 'active' : '' }}" href="{{ URL::to('admin') }}"><span class="fa fa-desktop"></span> Dashboard</a>
              <a class="list-group-item {{ Request::path() == 'admin/edit/about' ? 'active' : '' }}" href="{{ URL::to('admin/edit') }}"><span class="fa fa-edit"></span> Edit Website</a>
              <a class="list-group-item {{ Request::path() == 'admin/shows' ? 'active' : '' }}" href="{{ URL::to('admin/shows') }}"><span class="fa fa-microphone"></span> Radio Shows</a>
              <a class="list-group-item {{ Request::path() == 'admin/accounts/view' ? 'active' : '' }}" href="{{ URL::to('admin/accounts') }}"><span class="fa fa-user"></span> Accounts</a>
            </div>
          </div>
          <div class="col-md-10">
            @yield('content')
          </div>
        </div>
        
      </div>
      
      <div class="container-fluid">
        <div class="alert alert-info">
        	<strong>Important!</strong> Please make sure to log out of your session once you are finished!
        </div>
      </div>
    @else
      {{ Redirect::to('admin/login') }}
    @endif
  </body>
</html>
