<?php
if(isset($_REQUEST['food'])){
    $food = $_REQUEST['food'];
    // Connection parameters
    $host = 'mpcs53001.cs.uchicago.edu';
    $username = 'hanwenxu';
    $password = 'eso3ooV5';
    $database = $username.'DB';

    $connection = mysqli_connect($host,$username,$password,$database)
    or die('Could not connect '.mysqli_connect_error());
    echo 'Connection Established!<br>';
    $query3 = "SELECT * FROM Food where category = '$food'";
    $success = mysqli_query($connection, $query3);
    if (mysqli_num_rows($success) <= 0)
        die ("$food has already been deleted!<br>");

    $query = "DELETE FROM Food where category = '$food'";
    $result = mysqli_query($connection, $query);

    $query2 = "SELECT * FROM Food where category = '$food'";
    $success = mysqli_query($connection, $query2);
    if (mysqli_num_rows($success) <= 0) {
        print "Query success!<br>";
        print "Deleted food $food Successfully!<br>";
    }

    $FoodList = "SELECT category FROM Food";
    $r = mysqli_query($connection, $FoodList);
    print "Here is the updated list of food categories in the database: ";
    while ($tuple = mysqli_fetch_array($r)){
        print '<li>'.$tuple['category'];
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

