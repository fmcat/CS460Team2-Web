<?php
	// Connect to database.
	
	$link = mysqli_connect('CS460Team2.db.7275330.hostedresource.com','CS460Team2','Bentley123!','CS460Team2') or die('Could not connect: ' . mysql_error());
	mysqli_select_db($link,'CS460Team2') or die('Could not select database');
	
	
	// Mimics the functionality of mysql_result.
	function mysqli_result($result, $row, $field)
	{
		$result -> data_seek($row);
		$datarow = $result -> fetch_array();
		return $datarow[$field];
	}
	
	
	// Returns an array of sessions given a database link, and whether you want the sessions before or after today
	function getSessionSummary($dbLink, $greaterOrLessThan){
		
		$oldSessionQuery = '/* Find old sessions */ SELECT * FROM  `session` WHERE  `usernameStudent` =  "' . $_SESSION['username'] . '" AND  `sessionDate` ' . $greaterOrLessThan . '= DATE( NOW( ) ) LIMIT 0 , 3 ';
		$result = mysqli_query($dbLink, $oldSessionQuery);
		$sessionArray = [];
		for($i = 0; $i < mysqli_num_rows($result); $i++){			
				
				$sessionDate = mysqli_result($result, $i, "sessionDate");
				$dateArray = explode("-", $sessionDate);
				$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
				$date = $month_names[ltrim($dateArray[1],"0")-1] . " " . ltrim($dateArray[2],"0") . ", " . $dateArray[0];
				$sessionDate = $date;
				$sessionStartTime = date("g:i A", strtotime(mysqli_result($result, $i, "sessionStartTime")));
				$sessionEndTime = date("g:i A", strtotime(mysqli_result($result, $i, "sessionEndTime")));
				$sessionID = mysqli_result($result, $i, "sessionID");
				//echo $sessionDate . $sessionStartTime;
				$oneSession = array("sessionDate"  => $sessionDate,"sessionStartTime" => $sessionStartTime,"sessionEndTime" => $sessionEndTime, "sessionID" => $sessionID);
			array_push($sessionArray, $oneSession);
	
			}//array of post data
		return $sessionArray;		
		
	}	
	
	function authenticateUser($noAuth){
		/*
			Security script to determine if the user is authorized to see the current screen.
		*/
		
		session_start(); // Start a PHP session
		
		if(isset($noAuth) && $noAuth == true){ 
			/* 
				If this page does not require authentication (i.e. nothing
				sensitive is going to be displayed on the screen), 
				don't throw them to the next page. 
				Just start the current session.
				This is important because it shows the toolbar
				at the top of the page if the user is logged in,
				even though this page doesn't show anything sensitive.
			*/
	
		}
		else{
			
			if(isset($_SESSION["username"]) && $_SESSION["username"]!=null){
				/* 
					If they're authenticated (i.e. username & password are defined and not null)
					Do nothing and just relax
				*/
			}
			else{
				// Otherwise, they are not currently authenticated, but authentication is required. Throw them to login page.
				header("Location:login.php");
				exit(); // Be certain to exit before the rest of the page loads
			}
		}
	}
	
	// Include the UI Components 
	include_once('ui-components.php');

	
?>