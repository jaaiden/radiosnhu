<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RadioSNHU!</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//bootswatch.com/lumen/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/popover.js') }}"></script>
    <script src="//sdepold.github.io/jquery-rss/src/jquery.rss.js"></script>
    <script src="//www.openjs.com/scripts/events/keyboard_shortcuts/shortcut.js"></script>
    <script src="{{ asset('js/snap.js') }}"></script>

    <script type="text/javascript">
       <!--
       if (screen.width <= 767) {
         window.location = "{{ URL::to('m') }}";
       }
       //-->
    </script>

    <!-- <style type="text/css">
      .sticky {
        position:fixed;
        top:0;
      }

      .snap-content {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: auto;
        height: auto;
        z-index: 2;
        overflow: auto;
        -webkit-overflow-scrolling: touch;
        -webkit-transform: translate3d(0, 0, 0);
           -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
             -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
      }

      .snap-drawers {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: auto;
        height: auto;
      }

      .snap-drawer {
        position: absolute;
        top: 0;
        right: auto;
        bottom: 0;
        left: auto;
        width: 265px;
        height: auto;
        overflow: auto;
        -webkit-overflow-scrolling: touch;
        -webkit-transition: width 0.3s ease;
           -moz-transition: width 0.3s ease;
            -ms-transition: width 0.3s ease;
             -o-transition: width 0.3s ease;
                transition: width 0.3s ease;
      }

      .snap-drawer-left {
        left: 0;
        z-index: 1;
      }

      .snap-drawer-right {
        right: 0;
        z-index: 1;
      }

      .snapjs-left .snap-drawer-right,
      .snapjs-right .snap-drawer-left {
        display: none;
      }

      .snapjs-expand-left .snap-drawer-left,
      .snapjs-expand-right .snap-drawer-right {
        width: 100%;
      }
    </style> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- <script>
      $(document).ready(function(){
        var snapper = new Snap({
          element: document.getElementById('bodyContent'),
          disable: 'left'
        });
      });
    </script> -->

    <!-- <div class="snap-drawers">
      <div class="snap-drawer snap-drawer-right">
        <h4 class="page-header">Keyboard Shortcuts</h4>
        <dl>
          <dt><kbd>spacebar</kbd></dt>
          <dd>Starts/Stops the Radio</dd>
          <dt><kbd>up arrow</kbd></dt>
          <dd>Increases the volume of the Radio</dd>
          <dt><kbd>down arrow</kbd></dt>
          <dd>Decreases the volume of the Radio</dd>
        </dl>
      </div>
    </div> -->

    <!-- <div class="snap-content" id="bodyContent"> -->
    <div id="bodyContent">
      @yield('content')

      <div class="footer navbar-fixed-bottom">
        <div class="container">
          <p>&copy; 2015 RadioSNHU. Created by Andy Monahan and Zack Devine.</p>
        </div>
      </div>
    </div>
  </body>
</html>
