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

if(!is_numeric($userID))
    die('userID must be numeric.');
if ($userID > 100 || $userID < 1)
    die("userID $userID not found! Please enter a valid userID." .mysqli_error($dbcon));
// Get the attributes of the customer with the given userID
$query = "SELECT * FROM People_progress WHERE people_id = $userID";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

//echo $result->num_rows;

//Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result)
or die("userID $userID has no progress");


print "User <b>$userID</b> has the following attributes:";

// Printing customer attributes in HTML
print '<ul>';
print '<li> Weight change: '.$tuple['weight_change'];
print '<li> Healthy index: '.$tuple['healthy_index'];


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
