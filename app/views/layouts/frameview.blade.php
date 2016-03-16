<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/paper/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="//bootswatch.com/lumen/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//sdepold.github.io/jquery-rss/src/jquery.rss.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <script type="text/javascript">
      $(document).ready(function(){
        var height = $(window).height();
        $('#content').css('height', height);
      });
    </script>

    <div class="container">
      <div class="row">
        @yield('framecontent')
      </div>
    </div>
  </body>
</html>
