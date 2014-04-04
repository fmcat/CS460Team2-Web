<?php include('sys/sys.php');

	if($_SERVER['REQUEST_METHOD']=="GET"){
	    $myArray = array();
	    if ($result = $link->query("SELECT * FROM user")) {
	        $tempArray = array();
	        while($row = $result->fetch_object()) {
	                $tempArray = $row;
	                array_push($myArray, $tempArray);
	            }
	        echo json_encode($myArray);
	    }
	
	    $result->close();
	    $link->close();
	}
	
	else if ($_SERVER['REQUEST_METHOD']=="POST"){
		echo "You posted something to the server. Your username:";
		if(isset($_POST['username']) && isset($_POST['password'])){
			echo $_POST['username'];
		}
	}


?>