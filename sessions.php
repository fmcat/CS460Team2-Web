<?php include('sys/header.php');
	


?>

    <div class="container theme-showcase" role="main" style="margin-top:20px;">

      



	

      <div class="page-header">
      <ol class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li class="active">Sessons</li>
</ol>
        <h1>Session</h1>
        <p>You're looking at your sessions</p>
      </div>
      <div class="row">
              <div class="col-sm-6">
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
              </div>
              <div class="col-sm-6">
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
        </div><!-- /.col-sm-4 -->
      </div>

      


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>
</html>
