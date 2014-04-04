<?php include('sys/header.php');
	


?>

    <div class="container theme-showcase" role="main" style="margin-top:20px;">

      



	

      <div class="page-header">
      <ol class="breadcrumb">
  <li><a href="dashboard.php">Dashboard</a></li>
  <li><a href="sessions.php">Sessions</a></li>
  <li class="active">Sesson <?php echo $_GET['id']; ?></li>
</ol>
        <h1>Session</h1>
        <p>You're looking at session <?php echo $_GET['id']; ?></p>
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
