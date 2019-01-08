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
if($userID < 0 || $userID > 100 )
    die('userID invalid');
// Get the attributes of the health plan with the given health plan ID
$query = "SELECT * FROM healthy_plan_details WHERE user_id = $userID";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

//echo $result->num_rows;

//Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result)
or die("UserID $userID has been deleted! Please enter another user ID." .mysqli_error($dbcon));


print "Health plan by user <b>$userID</b> has the following attributes:";

// Printing customer attributes in HTML
print '<ul>';
print '<li> UserID: '.$tuple[user_id];
print '<li> MealID: '.$tuple[meal_id];
print '<li> Healthy Plan ID: '.$tuple[healthy_plan_id];
print '<li> Strength: '.$tuple['strength'];
print '<li> number of meals: '.$tuple['num_of_meals'];
print '<li> total calories per day: '.$tuple['total_calories'];

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
