<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shoppe Kart</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page"  style="background-image:url('dist/img/dd.jpg');">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php" style='color:white;'><b >Shoppe Kart</b> <span style='color:white;'> Portal</span></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="index.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name='Username' value='admin'>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name='Password' value='admin'>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name='SignIn' value='Sign In'>
        </div>
        <!-- /.col -->
      </div>
    </form>
	
	<?php
	error_reporting(0);
	session_start();
	ob_start();
	include("autoload.php");
 	echo $_POST['SignIn'] ."==". "Sign In"."\n\n";
  echo  $login_check = "SELECT * FROM $snloginaccess";
	if($_POST['SignIn'] == "Sign In")
	{
		$login_check = "SELECT * FROM $snloginaccess";
		$get = db_select($login_check);
		foreach($get as $lAccess)
		{
			
			if($lAccess->snuser == $_POST['Username'] && $lAccess->snpass == $_POST['Password'] && $lAccess->snaccess == "Employee")
			{
				$_SESSION['FName'] = $lAccess->snfirst;
				$_SESSION['LName'] = $lAccess->snlast;
				$_SESSION['Username'] = $lAccess->snuser;
				$_SESSION['Password'] = $lAccess->snpass;
				$_SESSION['Access'] = $lAccess->snaccess;
				$_SESSION['Rand'] = $lAccess->snrand;
				
				header("location:controller.php");
			}
			if($lAccess->snuser == $_POST['Username'] && $lAccess->snpass == $_POST['Password'] && $lAccess->snaccess == "Administrator")
			{
				$_SESSION['FName'] = $lAccess->snfirst;
				$_SESSION['LName'] = $lAccess->snlast;
				$_SESSION['Username'] = $lAccess->snuser;
				$_SESSION['Password'] = $lAccess->snpass;
				$_SESSION['Access'] = $lAccess->snaccess;
				$_SESSION['Rand'] = $lAccess->snrand;
				
				header("location:controller.php");
			}
			
		}
			if($lAccess->snuser != $_POST['Username'] && $lAccess->snpass != $_POST['Password'])
			{
				echo " <br><div class='callout callout-danger'>
                <p style='font-size:13px;font-weight:bold;color:white;'>Invalid Username or Password</p></div>";
								
			}

	}
	ob_end_flush();
	?>
    
    <!-- /.social-auth-links -->

  
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
