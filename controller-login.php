<?php

	/*
		This script is the controller that will respond to the Web App's forms to log in.
		This script does not handle API Authentication. That is handled by 'api/api-login.php'
	*/
	include "sys/sys.php"; // sys.php contains all of our important global variables
	
	if(isset($_POST['username'])&&isset($_POST['password'])&&$_POST['password']!=null&&$_POST['username']!=null){
		// This query selects username, password and type from the user table based on entered credentials.
		$query = "SELECT username,userpassword,userType,userFirstName FROM user WHERE username='" . $_POST['username'] . "' AND userpassword='" . $_POST['password'] . "'";
	
		$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	
		if(mysqli_result($result,0,0) == $_POST['username'] && mysqli_result($result,0,1) == $_POST['password'])
			{ // If there is a result, and the first record matches the username and password entered, start login process
	
	
			// Start a PHP session to keep track of this user.
			session_start();
	
			// Set the session variables for this user
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['usertype'] = mysqli_result($result,0,2);
			$_SESSION['firstname'] = mysqli_result($result,0,3);
	
			// Redirect them to the dashboard
			header("Location:dashboard.php");
			exit(); // Now, stop executing the rest of the script.
		}
		else
			{ // Otherwise, clearly, the user is not valid, ask them to re-input their credentials
			header("Location:login.php?badLogin=y");
			exit(); // Now, stop executing the rest of the script.
		}
	}
	else{
		// Otherwise, they didn't type in anything, and thus we restart their session, and then ask them to input information
		session_start();
		session_destroy();
		header("Location:login.php?badLogin=y");
		exit();
	}
?>