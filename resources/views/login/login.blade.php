<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Foodiee food porn</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
  </head>
	<body style="background-image: url('gaussian-blur-abstract-hd-wallpaper-1920x1200-10432.jpg')">
	<div id="fb-root"></div>

<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Log in to foodie</h1>
          <h1>
              {{--<fb:login-button scope="public_profile,email" size="xlarge" onlogin="checkLoginState();"> Login by Facebook--}}
              {{--</fb:login-button>--}}
          </h1>
      </div>
      <div class="modal-body">
          <form id="login-form" class="form col-md-12 center-block" method="post" action="<?php echo URL::to('/postLogin');?>">
            <div class="form-group">
              <input name="username" type="text" class="form-control input-lg" placeholder="Email">
            </div>
            <div class="form-group">
              <input name="password" type="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Login</button>
              <span class="pull-right">
                <a href="<?php echo URL::to('register');?>">Register</a>
              </span>
              <span><a href="#">Need help?</a></span>
            </div>
            <div class="form-group">
              @if(Session::has('success'))
              <span>
                  {{Session::get('success')}}
              </span>
              @endif
            </div>
          </form>

      </div>
      <div class="modal-footer">
         
      </div>
  </div>
  </div>

  <script type="text/javascript">
    $('#login-form').validate({
      rules:{
        user_input:{
          required:true,
          email:true
        },
        password:{
          required:true,
          minlength: 6
        }
      },
      messages:{
        user_input:{
          required: "Vui lòng nhập email",
          email: "Vui lòng nhập đúng định dạng email"
        },
        password:{
          required: "Vui lòng nhập mật khẩu",
          minlength: "Mật khẩu phải 6 kí tự trở lên"
        }
      }
    })
  </script>
</div>
	<!-- script references -->
	</body>
</html>