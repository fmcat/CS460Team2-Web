<?php include('sys/header.php');
	


?>

    <div class="container theme-showcase" role="main" style="margin-top:20px;">

      





      <div class="page-header">
        <h1>Pax Populi <?php echo $_SESSION['usertype'] ; ?> Dashboard</h1>
      </div>

      <div class="row">
      	
        <div class="col-sm-7">
        
        <?php 
        if($_SESSION['usertype']=="Student"||$_SESSION['usertype']=="Tutor"){
        	sessionLengthGraph();
        }
        else{
	        adminStatsTable();
        }
        ?>
			
        </div><!-- /.col-sm-8 -->
		<div class="col-sm-5">
        <?php if($_SESSION['usertype']=="Student"||$_SESSION['usertype']=="Tutor"){
	        /* If the user is a student or tutor, we display the upcoming sessions */
        ?>

          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Upcoming Sessions</h3>
            </div>
            <div class="panel-body">
			  <?php 
				  $arrayOfUpcomingSessions = getSessionSummary($link, ">");
				  $lastSession = end($arrayOfUpcomingSessions);
				  foreach($arrayOfUpcomingSessions as $upcomingSession){
				  	  echo "<p class='pull-right'>" . $upcomingSession["sessionStartTime"]. " - " . $upcomingSession["sessionEndTime"] . "</p>";
					  echo "<h4><a href='session.php?id=".$upcomingSession["sessionID"] ."'>" .$upcomingSession["sessionDate"]."</a></h4>";
					  if($upcomingSession !== $lastSession) {
						  echo "<hr>";
				      }
					  
				  }
              ?>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Past Sessions</h3>
            </div>
            <div class="panel-body">
              <?php 
				  $arrayOfUpcomingSessions = getSessionSummary($link, "<");
				  $lastSession = end($arrayOfUpcomingSessions);
				  foreach($arrayOfUpcomingSessions as $upcomingSession){
				  	  echo "<p class='pull-right'>" . $upcomingSession["sessionStartTime"]. " - " . $upcomingSession["sessionEndTime"] . "</p>";
					  echo "<h4><a href='session.php?id=".$upcomingSession["sessionID"] ."'>" .$upcomingSession["sessionDate"]."</a></h4>";
					  if($upcomingSession !== $lastSession) {
						  echo "<hr>";
				      }
					  
				  }
              ?>
            </div>
          </div>

        <?php }
	        else{
	        
		        /* Otherwise, we display the administration page's time graph in the right column */
				sessionLengthGraph();
		        
				} ?>
      </div><!-- /.col-sm-4 -->
      </div>
      <?php if($_SESSION['usertype']!="Student" && $_SESSION['usertype']!="Tutor"){
     					 echo '<div class="row">
      	
	 					 	<div class="col-sm-12">';
	      		        sessionEvaluationGraph();
	      		        echo '</div></div>';
      }
      ?>


<?php include_once('sys/footer.php');?>
