<?php
	/*
		\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
			Global UI Objects
		/////////////////////////////////////
	*/
	
	function navigationBar(){
		/*
			Displays the navigation bar for each page
		*/
		
		$classActive = ' class="active"'; // The CSS attribute for the active page
		
		if(strpos($_SERVER['REQUEST_URI'], "dashboard.php")!==false){
			$activeDashboard = $classActive; // Set this page to active on the menu bar.
		}
		if(strpos($_SERVER['REQUEST_URI'], "session.php")!==false||strpos($_SERVER['REQUEST_URI'], "sessions.php")!==false){
			$activeSessions = $classActive; // Set this page to active on the menu bar.
		}
		if(strpos($_SERVER['REQUEST_URI'], "evaluations.php")!==false||strpos($_SERVER['REQUEST_URI'], "evaluation.php")!==false){
			$activeEvaluations = $classActive; // Set this page to active on the menu bar.
		}
		if(strpos($_SERVER['REQUEST_URI'], "users.php")!==false){
			$activeUsers = $classActive; // Set this page to active on the menu bar.
		}
		if(strpos($_SERVER['REQUEST_URI'], "matches.php")!==false||strpos($_SERVER['REQUEST_URI'], "match.php")!==false){
			$activeMatches = $classActive; // Set this page to active on the menu bar.
		}
		if(strpos($_SERVER['REQUEST_URI'], "academics.php")!==false){
			$activeAcademics = $classActive; // Set this page to active on the menu bar.
		}
		
		$currentType = $_SESSION['usertype']; // Get the current user's usertype
		echo '<li'. $activeDashboard . '><a href="dashboard.php">Dashboard</a></li>';
		if($currentType == "Student" || $currentType == "Tutor"){
			// If the user is a student or tutor
			echo '
					
		            <li'.$activeSessions.'><a href="sessions.php">Sessions</a></li>
		           
		         ';
	    }
	    else if($currentType == "AfghanCoordinator" || $currentType == "AfghanPartner" || $currentType == "ExecutiveDirector" || $currentType == "InternationalCoordinator" || $currentType == "ProgramDirector"){
		    // Then, this user must be some type of admin
		    echo '
					
		            <li'.$activeEvaluations.'><a href="evaluations.php">Evaluations</a></li>
		            <li'.$activeUsers.'><a href="users.php">Users</a></li>
		            <li'.$activeMatches.'><a href="matches.php">Matches</a></li>
		            <li'.$activeAcademics.'><a href="academics.php">Academics</a></li>
		         ';
	    }
	}
	
	/*
		\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
			Dashboard UI Objects
		/////////////////////////////////////
	*/
	
	function sessionLengthGraph(){
		/*
			Displays average session length on a bar graph over each week for the current month.
			graph implemented using Charts.js
		*/
	
		echo '<h3 style="text-align:center;">Average Session Length</h3>
	        	<canvas id="canvas" height="200" width="600" style="margin-top:20px;"></canvas>
	
	        	<script>
	
					var barChartData = {
						labels : ["April 2","April 5","April 7","April 9","April 12","April 15","April 17"],
						datasets : [
							{
								fillColor : "#F38630",
								strokeColor : "#A84C03",
								data : [65,59,90,81,56,55,40]
							},
						]
	
					}
	
				var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
	
				</script>';
	}
	
	
	function sessionEvaluationGraph(){
		/*
			Displays evaluations of each session over time (for each month)
			graph implemented using Charts.js
		*/
	
		echo '<h3 style="text-align:center;">Average Session Evaluations</h3>
		        	<canvas id="canvas2" height="400" width="1200" style="margin-top:20px;"></canvas>
	
	        	<script>
	
					var lineChartData = {
						labels : ["January","February","March","April","May","June","July"],
						datasets : [
							{
								fillColor : "rgba(220,220,220,0.5)",
								strokeColor : "rgba(220,220,220,1)",
								pointColor : "rgba(220,220,220,1)",
								pointStrokeColor : "#fff",
								data : [3,3,2,1,2,3,4]
							},
							{
								fillColor : "rgba(151,187,205,0.5)",
								strokeColor : "rgba(151,187,205,1)",
								pointColor : "rgba(151,187,205,1)",
								pointStrokeColor : "#fff",
								data : [2,4,4,1,4,5,4]
							},
							{
								fillColor : "rgba(151,187,205,0.5)",
								strokeColor : "rgba(151,187,205,1)",
								pointColor : "rgba(151,187,205,1)",
								pointStrokeColor : "#fff",
								data : [2,4,4,1,5,2,1]
							}
						]
					}
	
				var myLine2 = new Chart(document.getElementById("canvas2").getContext("2d")).Line(lineChartData);
	
				</script>';
	}
	
	function adminStatsTable(){
		/*
			This table shows the number of missed sessions, bad reviews,
			and irregular session lengths for the current month for the current partner's
			students/tutors, or all students in general if administration
		*/
	
	
		// These variables contain the number of alerts for each category
		$missedSessions = 2;
		$badEvaluations = 4;
		$sessionTooShort = 8;
		$sessionTooLong = 1;
	
		// Now echo out each row of the table/list
		echo '
			<h4>Notifications for ' . date('F, Y') . '</h4>
			<ul class="list-group">
				  <li class="list-group-item">
				      <a href="sessions.php?param=missed">';
	
		if($missedSessions!=0){
			echo '<span class="badge pull-right">'.$missedSessions.'</span>';
		}
	
		echo 'Missed Sessions
				      </a>
				  </li>
				  <li class="list-group-item">
				      <a href="evaluations.php?param=bad">';
	
		if($badEvaluations!=0){
			echo '<span class="badge pull-right">'.$badEvaluations.'</span>';
		}
	
		echo 'Bad Evaluations
				      </a>
				  </li>
				  <li class="list-group-item">
				      <a href="sessions.php?param=tooshort">';
	
		if($sessionTooShort!=0){
			echo '<span class="badge pull-right">'.$sessionTooShort.'</span>';
		}
	
		echo 'Session too Short
					  </a>
				  </li>
				  <li class="list-group-item">
				  		<a href="sessions.php?param=toolong">';
	
		if($sessionTooLong!=0){
			echo '<span class="badge pull-right">'.$sessionTooLong.'</span>';
		}
	
		echo' Session too Long
					    </a>
				  </li>
				</ul>';
	}

?>