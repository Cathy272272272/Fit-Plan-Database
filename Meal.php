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
    die('meal ID must be numeric.');
if ( $userID > 100 || $userID < 1 ) die('meal ID is invalid.');
// Get the attributes of the health plan with the given health plan ID
$query = "SELECT * FROM meals_details WHERE meals_details_id = $userID";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

//echo $result->num_rows;

//Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result)
or die("meal ID $userID not found! Please enter a valid health plan ID." .mysqli_error($dbcon));


print "Health plan <b>$userID</b> has the following attributes:";

// Printing customer attributes in HTML
print '<ul>';
print '<li> Meals type: '.$tuple['meals_type'];
print '<li> Calories of a meal: '.$tuple['calories_of_a_meal'];

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
