<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RadioSNHU Admin Login</title>

    <link href="{{ asset('login/app.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid" style="margin-top:140px;">
      <div class="row-fluid">

        <div class="col-md-8 col-md-offset-2">
          
          <img src="https://scontent-lga3-1.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/11219577_1175321832482665_970268608776031537_n.jpg?oh=ed2eaa398480ec08df9226b3e36375e2&oe=56F7EC9A" class="center-block img-rounded" width="128" height="128">
          
          <br>
          
          <div class="panel panel-default">
            <div class="panel-heading">RadioSNHU Admin Login</div>
            <div class="panel-body">
              {{ Form::open(array('url' => 'admin/login', 'class' => 'form-horizontal')) }}
                <div class="form-group">
                  <label class="col-md-4 control-label">Username</label>
                  <div class="col-md-6">
                    {{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'Username')) }}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Password</label>
                  <div class="col-md-6">
                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '••••••••')) }}
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
                    <a href="{{ URL::to('admin/resetpassword') }}" class="btn btn-default">Forgot Password?</a>
                  </div>
                </div>
              {{ Form::close() }}
            </div>
          </div>

          <p>This page is intended only for the RadioSNHU Executive Board Members. If you are not part of the RadioSNHU Executive Board, please click <a href="{{ URL::to('') }}">here</a> to go back to the RadioSNHU homepage.</p>
        </div>

      </div>
    </div>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>