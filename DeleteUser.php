<?php
if(isset($_REQUEST['userID'])){
    $userID = $_REQUEST['userID'];
    // Connection parameters
    $host = 'mpcs53001.cs.uchicago.edu';
    $username = 'hanwenxu';
    $password = 'eso3ooV5';
    $database = $username.'DB';
    if(!is_numeric($userID))
        die('user ID must be numeric.');
    if ( $userID > 100 || $userID < 1 )
        die("The userID you entered does not exist.");
    $connection = mysqli_connect($host,$username,$password,$database)
    or die('Could not connect '.mysqli_connect_error());
    echo 'Connection Established!<br>';
    $comp = "SELECT * FROM People_basic_info WHERE people_id = '$userID' ";
    $result = mysqli_query($connection, $comp);
    if (mysqli_num_rows($result) <= 0)
        die("The userID you entered has been already deleted.<br>");
    $query = "DELETE FROM People_basic_info where people_id = '$userID'";
    $result = mysqli_query($connection, $query);

    $query2 = "SELECT * FROM People_basic_info where people_id = '$userID'";
    $success = mysqli_query($connection, $query2);
    if (mysqli_num_rows($success) <= 0) {
        print "Query success!<br>";
        print "Deleted user $userID Successfully!<br>";
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

