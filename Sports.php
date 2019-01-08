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
//$userID = $_REQUEST['userID'];
//
//if(!is_numeric($userID))
//    die('sports ID must be numeric.');
//if ($userID > 100 || $userID < 1 ) die('sports ID must be invalid.');
//// Get the attributes of the health plan with the given health plan ID
//$query = "SELECT * FROM Sports";
//$result = mysqli_query($dbcon, $query)
//or die('Query failed: ' . mysqli_error($dbcon));
//
////echo $result->num_rows;
//
////Can also check that there is only one tuple in the result
//$tuple = mysqli_fetch_array($result)
////or die("Sports ID $userID has been deleted! Please enter another Sports ID." .mysqli_error($dbcon));

$connection = mysqli_connect($host,$username,$password,$database);

        $SportsList = "SELECT * FROM Sports";
        $r = mysqli_query($connection, $SportsList);
        print "Here is the list of sports types in the database: ";
        while ($tuple = mysqli_fetch_array($r)){
            print '<li>'.$tuple[0];
        }
// Printing customer attributes in HTML
//print '<ul>';
//print '<li> Duration: '.$tuple['duration'];
//print '<li> Sports type: '.$tuple['sports_type'];
//
//print '</ul>';

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
