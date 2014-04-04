<?php
	include_once('sys/sys.php');
	$schoolQuery = 'SELECT  `organizationName` ,  `organizationID` FROM  `organization`';
	$schoolResult = mysqli_query($link, $schoolQuery);	
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pax Populi</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Roboto -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700">

    <link rel="stylesheet" href="android-ui/css/ratchet.min.css">
    <link rel="stylesheet" href="android-ui/css/ratchet-theme-android.min.css">
    <style type="text/css">
    	.slider,
		.slider img {	
		  margin-bottom: 0;
		  height: 150px;
		}
		body{
			font-size:120%;
		}
    </style>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style type="text/css">
    input.holo[type='text'] {
		/* You can set width to whatever you like */
		font-family: "Roboto", "Droid Sans", sans-serif;
		font-size: 16px;
		margin: 0;
		padding: 10px 10px 8px 10px;
		position: relative;
		display: block;
		outline: none;
		border: none;
		background:transparent;
		background: bottom left linear-gradient(#a9a9a9, #a9a9a9) no-repeat, bottom center linear-gradient(#a9a9a9, #a9a9a9) repeat-x, bottom right linear-gradient(#a9a9a9, #a9a9a9) no-repeat;
		background-size: 1px 6px, 1px 1px, 1px 6px;
	}
	input.holo[type='email'] {
		/* You can set width to whatever you like */
		font-family: "Roboto", "Droid Sans", sans-serif;
		font-size: 16px;
		margin: 0;
		padding: 10px 10px 8px 10px;
		position: relative;
		display: block;
		outline: none;
		border: none;
		background:transparent;
		background: bottom left linear-gradient(#a9a9a9, #a9a9a9) no-repeat, bottom center linear-gradient(#a9a9a9, #a9a9a9) repeat-x, bottom right linear-gradient(#a9a9a9, #a9a9a9) no-repeat;
		background-size: 1px 6px, 1px 1px, 1px 6px;
	}
	input.holo[type='text']:hover, input.holo[type='text']:focus {
		background: bottom left linear-gradient(#0099cc, #0099cc) no-repeat, bottom center linear-gradient(#0099cc, #0099cc) repeat-x, bottom right linear-gradient(#0099cc, #0099cc) no-repeat;
		background-size: 1px 6px, 1px 1px, 1px 6px;	
	} 
		input.holo[type='email']:hover, input.holo[type='email']:focus {
		background: bottom left linear-gradient(#0099cc, #0099cc) no-repeat, bottom center linear-gradient(#0099cc, #0099cc) repeat-x, bottom right linear-gradient(#0099cc, #0099cc) no-repeat;
		background-size: 1px 6px, 1px 1px, 1px 6px;	
	} 
    </style>
  </head>
  <body style="background-color:#eee!important;">
    <div class="content" >

      <form method="POST" action="controller-register.php" style="padding:20px;" >
  <h1>Register</h1>
  <div>
    <label>First Name</label>
    <input type="text" class="holo" name="firstname" placeholder="Connor">
  </div>
  <div>
    <label>Last Name</label>
    <input type="text" class="holo" name="lastname" placeholder="MacDonald">
  </div>
  <div>
    <label>Email</label>
    <input type="email" class="holo" name="email" placeholder="yourname@email.com">
  </div>
  <div>
  	<label >School/Organization</label>
  	<select name="schoolorg">
  	<option>-- Select One --</option>
  	<?php 
  	for($i = 0; $i < mysqli_num_rows($schoolResult); $i++){
  		echo '<option value="' . mysqli_result($schoolResult, $i, "organizationID") . '">' . mysqli_result($schoolResult, $i, "organizationName") . '</option>';
  	}
  	?>
	</select>
  </div>
  <div>
  	<label>Date of Birth</label>
  	<table style="width:100%">
  	<tr>
  	<td style="padding-right:10px">
  	<select name="month">
  		<option>Month</option>
  		<option value="01">January</option>
  		<option value="02">February</option>
  		<option value="03">March</option>
  		<option value="04">April</option>
  		<option value="05">May</option>
  		<option value="06">June</option>
  		<option value="07">July</option>
  		<option value="08">August</option>
  		<option value="09">September</option>
  		<option value="10">October</option>
  		<option value="11">November</option>
  		<option value="12">December</option>
  	</select>
  	</td>
  	<td style="padding-right:10px">
  	<select name="day">
  		<option>Day </option>
  		<?php for($i=1; $i<=31; $i++){
	  		echo '<option value="' . $i . '">' . $i . '</option>';
  		}
  		?>
  	</select>
  	</td>
  	<td>
  	<select name="year">
  		<option>Year</option>
  		<?php for($i=2010; $i>=1900; $i--){
	  		echo '<option value="' . $i . '">' . $i . '</option>';
  		}
  		?>
  	</select>
  	</td>
  	</tr>
  	</table>
  </div>
  <div>
    <label>Address</label>
    <input type="text" class="holo" name="address" placeholder="313 West Main Street">
  </div>
  <div>
    <label>City/Town</label>
    <input type="text" class="holo" name="city" placeholder="Anytown">
  </div>
  <div>
    <label>State</label>
    <input type="text" class="holo" name="state" placeholder="MA">
  </div>
  
  <div>
    <label>Phone Number</label>
    <input type="text" class="holo" name="phone" placeholder="617-111-2222">
  </div>
  <div>
	  <select name="ountry">
  		<option>-- Select a Country --</option>
  		<option value="Afghanistan">USA</option>
  	</select>
  </div>

   <button class="btn" color:>Register Account</button>

</form>


    </div>



    
  </body>
</html>