<?php
if(isset($_REQUEST['sports'])){
    $sports = $_REQUEST['sports'];
    // Connection parameters
    $host = 'mpcs53001.cs.uchicago.edu';
    $username = 'hanwenxu';
    $password = 'eso3ooV5';
    $database = $username.'DB';

    $connection = mysqli_connect($host,$username,$password,$database)
    or die('Could not connect '.mysqli_connect_error());
    echo 'Connection Established!<br>';

    $dupesql = "SELECT * FROM Sports WHERE sports_type = '$sports'";
    $duperaw = mysqli_query($connection, $dupesql);
    if (mysqli_num_rows($duperaw) > 0) {
        print "Sports already exists!";
    }
    else {
        $query = "INSERT INTO Sports(sports_type)
              VALUES( '$sports')";
        $result = mysqli_query($connection, $query);
        print "Query success!<br>";
        print "Sports Added into database!<br>";
        $SportsList = "SELECT sports_type FROM Sports";
        $r = mysqli_query($connection, $SportsList);
        print "Here is the updated list of sports types in the database: ";
        while ($tuple = mysqli_fetch_array($r)){
            print '<li>'.$tuple['sports_type'];
        }
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
