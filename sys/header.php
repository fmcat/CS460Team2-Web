<?php
	// Include all global variables and functions
	include_once('sys.php');
	
	/* 
		Run User Authentication Function defined in 'sys/sys.php'
		It passes over $noAuth, which is false by default,
		but is true on public facing pages that do not
		require user authentication.
		By default, $noAuth is false, so by default all pages
		require authentication unless $noAuth is set to true.
	*/
	
	authenticateUser($noAuth); 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Bentley University CS460 Team Hyperion">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title>Pax Populi</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/Chart.js"></script>
    <style>
	canvas{
		/* This styling allows the graphs to be full width/responsive */
        width: 100% !important;
        max-width: 1200px;
        height: auto !important;
    }
    body{
    	/* Adds a 20 px padding to the bottom of the whole screen */
	    padding-bottom:40px; 
    }
		</style>
		
		<!-- Allow this app to be used as web app on Apple devices -->
		<link rel="apple-touch-icon" href="img/apple-icon.png">
		<meta content='initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<meta content='yes' name='apple-mobile-web-app-capable'>
		<meta content='black-translucent' name='apple-mobile-web-app-status-bar-style'>

  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Expand</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php">Pax Populi</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          
            
              
              <?php 
              
              navigationBar(); // Navigation bar defined in 'sys/ui-components.php'
              ?>
              
            <?php 
            if(isset($_SESSION['username']) && $_SESSION['username'] != null){
            echo'<li class="hidden-sm hidden-xs"><p class="navbar-text">'.'<span class="glyphicon glyphicon-user"></span> ' . $_SESSION['firstname'] . '</p></li>';
            }?>
            
              <?php
              echo ' <li>';
              	
              // Display log in/out button
              if(isset($_SESSION['username']) && $_SESSION['username'] != null){
				  echo ' <a href="logout.php" >Log Out </b></a>';
              }
              else{
	              echo '<a href="login.php" >Log In </b></a>';
              }
              ?>
            </li>
            
          </ul>
        </div><!--/.nav-collapse -->
        
      </div>
    </div>