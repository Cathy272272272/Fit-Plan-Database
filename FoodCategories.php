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

// Selecting a database
//   Unnecessary in this case because we have already selected
//   the right database with the connect statement.
mysqli_select_db($dbcon, $database)
or die('Could not select database');
print 'Selected database successfully!<br>';

$food = $_REQUEST['food'];

// Listing tables in your database
$query = "SELECT distinct n_name from Nutrition_facts where n_category = '$food'";
$result = mysqli_query($dbcon, $query)
or die('Show tables failed: ' . mysqli_error());

print "The $food categories in $database database are:<br>";

$tuple = mysqli_fetch_row($result);
// Printing table names in HTML
print '<ul> ';
//print '<ul> '.$tuple['n_name'];
while ($tuple = mysqli_fetch_row($result)) {
    print '<li> '.$tuple[0].'</li>';
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
