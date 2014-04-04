<html>
	<head>
		<title>Pax Populi</title>
	</head>
	<body>
		<p>Welcome!</p>
		<br />
		<p>This may, in fact, be a query:</p>
		<?php
			include "sys.php";
			$query = "SELECT * FROM user WHERE username='" . $_SESSION['username'] . "';";
			echo "<p>" . $query . "</p><br />";
			$query_result = mysqli_query($link,$query);
			echo "<p>Results:</p>";
			for($i=0; $i<12; $i++)
			{
				echo "<p>" . mysqli_result($query_result,0,$i) . "</p>";
			}
		?>
		<a href="logout.php">Logout</a>
	</body>
</html>