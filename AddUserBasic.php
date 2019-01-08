<?php
if(isset($_REQUEST['firstName'],$_REQUEST['lastName'],$_REQUEST['email'],$_REQUEST['street'],$_REQUEST['city'], $_REQUEST['state'])){
    $firstName = $_REQUEST['firstName'];
    $lastName = $_REQUEST['lastName'];
    $email = $_REQUEST['email'];
    $street = $_REQUEST['street'];
    $city = $_REQUEST['city'];
    $state = $_REQUEST['state'];
    // Connection parameters
    $host = 'mpcs53001.cs.uchicago.edu';
    $username = 'hanwenxu';
    $password = 'eso3ooV5';
    $database = $username.'DB';

    $connection = mysqli_connect($host,$username,$password,$database)
    or die('Could not connect '.mysqli_connect_error());
    echo 'Connection Established!<br>';

    $dupesql = "SELECT * FROM People_basic_info WHERE first_name = '$firstName' AND last_name = '$lastName' AND email = '$email'";
    $duperaw = mysqli_query($connection, $dupesql);
    if (mysqli_num_rows($duperaw) > 0) {
        print "User already exists!";
    }
    else {
        $query = "INSERT INTO People_basic_info(first_name, last_name, email, street, city, state)
              VALUES( '$firstName','$lastName','$email','$street','$city', '$state')";
        $result = mysqli_query($connection, $query);
        print "Query success!<br>";
        print "User Added into database!<br>";
        $retrieve_last = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM People_basic_info ORDER BY people_id DESC"));
        printf( "%s %s is added into database!", $retrieve_last['first_name'], $retrieve_last['last_name']);
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

