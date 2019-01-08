<?php
if(isset($_REQUEST['userID'], $_REQUEST['age'],$_REQUEST['gender'],$_REQUEST['bloodType'],$_REQUEST['weight'],$_REQUEST['height'])){
    $userID = $_REQUEST['userID'];
    $age = $_REQUEST['age'];
    $gender = $_REQUEST['gender'];
    $bloodType = $_REQUEST['bloodType'];
    $weight = $_REQUEST['weight'];
    $height = $_REQUEST['height'];
    $date = date("Y-m-d");
    // Connection parameters
    $host = 'mpcs53001.cs.uchicago.edu';
    $username = 'hanwenxu';
    $password = 'eso3ooV5';
    $database = $username.'DB';
    $connection = mysqli_connect($host,$username,$password,$database)
    or die('Could not connect '.mysqli_connect_error());
    echo 'Connection Established!<br>';
    if ( !is_numeric($userID) || $userID > 100 || $userID < 0 )
        die ("UserID invalid.");
    $dupesql = "SELECT * FROM People_health_info WHERE people_id = $userID AND record_date = '$date'";
    $duperaw = mysqli_query($connection, $dupesql);
    if (mysqli_num_rows($duperaw) > 0) die ("Duplicate record for this user today!");
        $query = "INSERT INTO People_health_info(people_id, record_date, age, gender, blood_type, weight, height)
              VALUES( '$userID','$date','$age','$gender','$bloodType','$weight','$height')";
        $result = mysqli_query($connection, $query);
        print "Query success!<br>";
        print "User Added into database!<br>";
        $retrieve_last = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM People_health_info where people_id = $userID and record_date = '$date'"));
        printf( "Health information Record %d for user %d is added into database!", $retrieve_last['record_id'], $retrieve_last['people_id']);
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
