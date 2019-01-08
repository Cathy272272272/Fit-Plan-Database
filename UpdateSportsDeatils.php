<?php

$sports = $_REQUEST['sports'];
$calories = $_REQUEST['calories'];

// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hanwenxu';
$password = 'eso3ooV5';
$database = $username.'DB';


$connection = mysqli_connect($host,$username,$password,$database)
or die('Could not connect '.mysqli_connect_error());
echo 'Connection Established!<br>';


//check if userName exists
$sportsType = "SELECT sports_type FROM Sports_details WHERE sports_type = '$sports'";
$change = mysqli_query($connection, $sportsType);

//check if password is correct
//$log = "SELECT * FROM Users WHERE userName = '$user' and password = '$pw'";
//$r = mysqli_query($connection, $log);
if (mysqli_num_rows($change) <= 0) {
    print "The sports type does not exist! <br>";
    print "Please go back and enter a valid sports type. <br>";
}

else {

    $ud = "UPDATE Sports_details SET calories_per_hour = $calories WHERE sports_type = '$sports'";
    $change = mysqli_query($connection, $ud);
    $query2 = "SELECT * FROM Sports_details where sports_type = '$sports' and calories_per_hour = $calories";
    $success = mysqli_query($connection, $query2);

    if (mysqli_num_rows($success) > 0) {
        print "Query success!<br>";
        print "Updated calories to be '$calories' succesfully<br>";
    }
    else {
        print "Unsuccessful Update! Try again <br>";
    }

}



mysqli_close($connection);

?>
<br>
<form action="./index.html">
    <input type="submit" value="Go back to Main Page">
</form>
<nav>
    <ul>
        <li><a href="./index.html">Home</a></li>
    </ul>
</nav>

