<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RadioSNHU Rocks!</title>

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/paper/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="jumbotron">
      <div class="container">
        <h3>Welcome to RadioSNHU!</h3>
      </div>
    </div>
    <div class="container-fluid" style="margin-top:20px;">
      <div class="row-fluid">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <p class="lead">To complete your DJ profile, please click <a href="{{ URL::to('data/create/' . $code) }}">here</a>. Setting up your DJ profile should take no more than a minute to complete. The information you enter will be validated by RadioSNHU's E-Board team, so keep it clean!<p>
          <p class="lead">Thank you,<br>RadioSNHU</p>
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
  </body>
</html>
