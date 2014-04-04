<?php include('sys/sys.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>Sign into Pax Populi</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Custom styles for this template -->
    <style type="text/css">
    body {
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
		
      <form class="form-signin" role="form" method="post" action="controller-login.php">
      <img src="img/pax-populi-logo.png" width="100%">

        <?php if(isset($_GET['badLogin'])){?>
	        <div class="alert alert-warning alert-dismissable" id="passwordAlert">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="$('#passwordAlert').hide()">&times;</button>
			  <strong>Sorry! </strong> We didn't recognize your username and password.
			</div>
		<?php }else{?>
			<h2 class="form-signin-heading">Please sign in</h2>
		<?php }?>
        <input type="email" class="form-control" placeholder="Email address" name="username" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-bottom:10px;">Sign in</button>
        <p style="text-align:center;">Don't have an account? <a href="android-register.php">Register</a> for one.</p>
        
      </form>

    </div> <!-- /container -->
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
