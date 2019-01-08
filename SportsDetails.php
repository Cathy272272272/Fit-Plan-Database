<?php

// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'hanwenxu';
$password = 'eso3ooV5';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

// Getting the input parameter:
$userID = $_REQUEST['userID'];
//if(!is_numeric($userID))
//    die('sports ID must be numeric.');
//if ($userID > 100 || $userID < 1 ) die('sports ID must be invalid.');
// Get the attributes of the sports plan with the given sports plan ID
$query = "SELECT * FROM Sports_details WHERE sports_type = '$userID'";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

//echo $result->num_rows;

//Can also check that there is only one tuple in the result
//$tuple = mysqli_fetch_array($result)
//or die("Sports ID $userID not found! Please enter a valid Sports ID." .mysqli_error($dbcon));


print "Sports <b>$userID</b> has the following calories per hour:";

// Printing customer attributes in HTML
print '<ul>';
while ($tuple = mysqli_fetch_row($result)) {
    print '<li> '.$tuple[1].'</li>';
}
print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>
<nav>
    <ul>
        <li><a href="./index.html">Home</a></li>
    </ul>
</nav>
