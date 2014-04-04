<?php
include_once('sys/sys.php');




function printArray($array){
     foreach ($array as $key => $value){
        echo "$key => $value <br>";
        if(is_array($value)){ //If $value is an array, print it as well!
            printArray($value);
        }  
    } 
}
printArray($_POST);

$addUserQuery = 'INSERT INTO user (`username`,  `organizationID`,  `userPassword`,  `userSkypeID`,  `userFirstName`,  `userLastName`,  `userGender`,  `userDoB`,  `userAddress`,  `userPhone`,  `userCountry`,  `userCity`,  `userNationality`,  `userLanguage`,  `userTimeZone`,  `userType`) VALUES ("' . $_POST["username"] . '",  "' . $_POST["organizationID"] . '",  "' . $_POST["userPassword"] . '",  "' . $_POST["userSkypeID"] . '",  "' . $_POST["userFirstName"] . '",  "' . $_POST["userLastName"] . '",  "' . $_POST["userGender"] . '",  "' . $_POST["userDoB"] . '",  "' . $_POST["userAddress"] . '",  "' . $_POST["userPhone"] . '",  "' . $_POST["userCountry"] . '",  "' . $_POST["userCity"] . '",  "' . $_POST["userNationality"] . '",  "' . $_POST["userLanguage"] . '",  "' . $_POST["userTimeZone"] . '",  "' . $_POST["userType"] . '")';
echo($addUserQuery);

echo $_POST['firstname'];
echo $_POST['lastname'];
echo $_POST['email'];
echo $_POST['schoolorg'];
echo $_POST['month'];
echo $_POST['day'];
echo $_POST['year'];
echo $_POST['address'];
echo $_POST['citytown'];
echo $_POST['state'];
echo $_POST['phone'];

//mysqli_query($link,$query) or die('Query failed: ' . mysql_error());



?>