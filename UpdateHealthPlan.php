<?php
if(isset($_REQUEST['planID'])){
    $planID = $_REQUEST['planID'];
    $date = date("Y-m-d");

    // Connection parameters
    $host = 'mpcs53001.cs.uchicago.edu';
    $username = 'hanwenxu';
    $password = 'eso3ooV5';
    $database = $username.'DB';
    if(!is_numeric($planID))
        die('user ID must be numeric.');
    if ( $planID > 100 || $planID < 1 )
        die("The userID you entered does not exist.");
    $connection = mysqli_connect($host,$username,$password,$database)
    or die('Could not connect '.mysqli_connect_error());
    echo 'Connection Established!<br>';
    $comp = "SELECT * FROM healthy_plan WHERE healthy_plan_id = '$planID' ";
    $result = mysqli_query($connection, $comp);
    if (mysqli_num_rows($result) <= 0)
        die("The plan you entered has been deleted.Update another plan<br>");
    $query = "UPDATE healthy_plan SET start_date = '$date' where healthy_plan_id = '$planID'";
    $result = mysqli_query($connection, $query);

    $query2 = "SELECT * FROM healthy_plan where healthy_plan_id = '$planID' AND start_date = '$date'";
    $success = mysqli_query($connection, $query2);
    if (mysqli_num_rows($success) > 0) {
        print "Query success!<br>";
//        print "Deleted plan $planID Successfully!<br>";
    }
}


// Closing connection
mysqli_close($connection);

?>
<!--<br>-->
<!--<form action="../index.html">-->
<!--    <input type="submit" value="Go back to Main Page">-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
<nav>
    <ul>
        <li><a href="./index.html">Home</a></li>
    </ul>
</nav>

