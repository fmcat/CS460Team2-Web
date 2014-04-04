<?php
    include("../sys/sys.php");

    if($_SERVER['REQUEST_METHOD']=="GET")
    {
        $myArray = array();
        if ($result = $link->query("SELECT username FROM user;"))
        {
            $tempArray = array();
            while($row = $result->fetch_object())
            {
                $tempArray = $row;
                array_push($myArray, $tempArray);
            }
            echo json_encode($myArray);
        }
        $result->close();
        $link->close();
    }
    else if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if(isset($_POST['username'])&&isset($_POST['password'])&&$_POST['password']!=null&&$_POST['username']!=null)
        {
            $queryString = "SELECT username, userPassword FROM user WHERE username = '" . $_POST['username'] . "' AND userPassword = '" . $_POST['password'] . "';";
            $myArray = array();
            if ($result = $link->query($queryString))
            {
                if(mysqli_result($result,0,0) == $_POST['username'] && mysqli_result($result,0,1) == $_POST['password'])
                {       
                    echo "true";
                    //session_start();
                }
                else
                {
                    echo "false"; //No user found
                }
            }
            else
            {
                echo "false"; // Query not successful
            }
            $result->close();
            $link->close();
            //echo "Username: " . $_POST['username'] . " Password: " . $_POST['password'];
        }
        else
        {
            echo "false"; // Username and/or password not specified
        }
    }
?>