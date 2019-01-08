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
// Get the attributes of the health plan with the given health plan ID
$query = "SELECT * FROM healthy_plan WHERE plan_type = '$userID'";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

//echo $result->num_rows;

//Can also check that there is only one tuple in the result
//$tuple = mysqli_fetch_array($result)
//or die("Plan $userID not found! Please select a valid Health plan ID." .mysqli_error($dbcon));

print '<ul>';
print "Health plan <b>$userID</b> has the following durations:";
print '<ul>';

// Printing customer attributes in HTML
while ($tuple = mysqli_fetch_array($result)) {
    print '<li> Plan type: ' . $tuple['plan_type'];
    print '<li> Start date: ' . $tuple['start_date'];
    print '<li> End date: ' . $tuple['end_date'];
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
